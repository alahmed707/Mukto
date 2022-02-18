<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{
    Models\Currency,
    Models\Campaign,
    Models\Donation,
    Models\Notification,
};
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;
use Session;
use App\Helpers\OrderHelper;
use Illuminate\Support\Str;

class MollieController extends CheckoutBaseControlller
{


    public function store(Request $request)
    {
        $available_currency = OrderHelper::mollie_currencies();
        $input = $request->all();

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

      
   
        if($request->aninumasType){
            $input['aninumasType'] = $request->aninumasType;
        }else{
            $input['aninumasType'] = null;
        }
        
        if(Session::has('currency')){
            $currency = Currency::findOrFail(Session::get('currency'));
        }else{
            $currency = Currency::where('is_default',1)->first();
        }


        if(!in_array($currency->name,$available_currency))
        {
            return redirect()->back()->with('unsuccess',__('Invalid Currency For Molly Payment.'));
        }


        $order['item_name'] = $this->gs->title." Order";
        $order['item_number'] = Str::random(4).time();
        $order['item_amount'] = $request->donation_amount * $currency->value;
        $notify_url = route('front.molly.notify');
       
        // dd($currencies);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency->name,
                'value' => ''.sprintf('%0.2f', $order['item_amount']).'', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => $order['item_name'] ,
            'redirectUrl' => $notify_url,
            ]);
           
        /** add payment ID to session **/
        Session::put('input_data',$input);
        Session::put('order_data',$order);
        Session::put('order_payment_id', $payment->id);

        $payment = Mollie::api()->payments()->get($payment->id);

        return redirect($payment->getCheckoutUrl(), 303);

    }

    public function notify(Request $request)
    {
       
        $input = Session::get('input_data');
        $order_data = Session::get('order_data');
        $success_url = route('front.payment.return');
        $cancel_url = route('front.payment.cancle');
        $input_data = $request->all();
        /** Get the payment ID before session clear **/

        $payment = Mollie::api()->payments()->get(Session::get('order_payment_id'));
        if($payment->status == 'paid'){
            $donation = new Donation;
            $donation['donation_amount'] = $this->Currency($input['donation_amount']);
            $donation['payment_type'] = 'Molly Pay';
            $donation['email'] = $input['email'];
            $donation['fname'] = $input['fname'];
            $donation['lname'] = $input['lname'];
            $donation['number'] = $input['number'];
            $donation['donation_number'] =  $order_data['item_number'];
            $donation['address'] = $input['address'];
            $donation['currency'] = $input['currency_code'];;
            $donation['title'] = $order_data['item_name'];
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
           
                   //available_fund Update //
        $campaign = new Campaign;
        $before = $campaign->findOrFail($input['campaign_id'])->available_fund;
        $after_fund = $before + $this->Currency($input['donation_amount']);
        $campaign->findOrFail($input['campaign_id'])->update([
            'available_fund' => $after_fund
        ]);

        //Notification -----------//
        $notification = new Notification;
        $notification->donation_id = $input['campaign_id'];
        $notification->save();

        Session::forget('input_data');
        Session::forget('order_data');
        Session::forget('order_payment_id');
        
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