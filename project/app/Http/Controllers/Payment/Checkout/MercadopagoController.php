<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{
    Models\PaymentGateway,
    Models\Currency,
    Models\Campaign,
    Models\Donation,
    Models\Notification,
};
use Illuminate\Http\Request;
use MercadoPago;
use Session;
use App\Helpers\OrderHelper;
use Illuminate\Support\Str;

class MercadopagoController extends CheckoutBaseControlller
{
    public function store(Request $request)
    {

       
        if($request->aninumasType == 1){
            $request->validate([
            'donation_amount' => 'required',
            ]);
    
    
        }else{
            $request->validate([
                'donation_amount' => 'required',
                'fname'  => 'required',
                'number' => 'required',
                'email'  => 'required',
                'address'=> 'required',
            ]);
        }

        $available_currency = OrderHelper::mercadopago_currencies();
        $input = $request->all();
        $data = PaymentGateway::whereKeyword('mercadopago')->first();
        $paydata = $data->convertAutoData();
        $item_name = $this->gs->title." Order";
        $item_number = Str::random(4).time();


      
        if(Session::has('currency')){
            $currency = Currency::findOrFail(Session::get('currency'));
        }else{
            $currency = Currency::where('is_default',1)->first();
        }

      
        if($request->aninumasType){
            $input['aninumasType'] = $request->aninumasType;
        }else{
            $input['aninumasType'] = null;
        }

        if(!in_array($currency->name,$available_currency))
        {
            return redirect()->back()->with('unsuccess',__('Invalid Currency For Mercadopago Payment.'));
        }

        $item_name = $this->gs->title." Order";
        $item_number = Str::random(4).time();
        $item_amount = $input['donation_amount'];
        $cancel_url = route('front.payment.cancle');
        $success_url = route('front.payment.return');
        
        MercadoPago\SDK::setAccessToken($paydata['token']);
        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $item_amount;
        $payment->token = $request->token;
        $payment->description = $item_name;
        $payment->installments = 1;
        if($request->email) {
            $payment->payer = array(
                "email" => $input['email']
            );    
        } else {
            $payment->payer = array(
                "email" => 'aninumas@gmail.com'
              );
        }
      
        $payment->save();
      
        if ($payment->status == 'approved') {
           
           $donation = new Donation;
            $donation['donation_amount'] = $this->Currency($input['donation_amount']);
            $donation['payment_type'] = 'Mercadopago';
            $donation['email'] = $input['email'];
            $donation['fname'] = $input['fname'];
            $donation['lname'] = $input['lname'];
            $donation['number'] = $input['number'];
            $donation['donation_number'] =  $item_number;
            $donation['address'] = $input['address'];
            $donation['currency'] = $input['currency_code'];;
            $donation['title'] = $item_name;
            $donation['payment_status'] = "Completed";
            $donation['note'] = $input['note'];
            $donation['campaign_id'] = $input['campaign_id'];
            if($input['aninumasType'] != null){
                $donation['type'] = 'aninumas';
            }else{
                $donation['type'] = 'normal';
            }
            $donation['txnid'] = $payment->id;

           $donation->save();

            
            return redirect($success_url);

        } 

        return redirect($cancel_url);

    }

    private function Currency($value)
    {
        if(Session::has('currency')){
            $currency = Currency::findOrFail(Session::get('currency'));
        }else{
            $currency = Currency::where('is_default',1)->first();
        }

        $amount =  $value / $currency->value;
        return round($amount,2);
    }

}