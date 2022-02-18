<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\Traits\Paytm;
use App\Models\Campaign;
use App\Models\Currency;

use App\Models\Notification;
use App\Models\Donation;

use App\Http\Controllers\Payment\Checkout\CheckoutBaseControlller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;


class PaytmController extends CheckoutBaseControlller
{
    use Paytm;

    public function store(Request $request)
    {

        if($this->curr->name != "INR")
        {
            return redirect()->back()->with('unsuccess',__('Please Select INR Currency For This Payment.'));
        }
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


        $input = $request->all();
        if($request->aninumasType){
            $input['aninumasType'] = $request->aninumasType;
        }else{
            $input['aninumasType'] = null;
        }


        $order['title'] = $this->gs->title." Order";
        $order['item_number'] = Str::random(4).time();
        $order['item_amount'] = $request->donation_amount;
        $cancel_url = route('front.payment.cancle');


        Session::put('input_data',$input);
        Session::put('order_data',$order);
        Session::put('order_payment_id', $order['item_number']);

	    $data_for_request = $this->handlePaytmRequest( $order['item_number'], $order['item_amount'], 'checkout' );
	    $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
	    $paramList = $data_for_request['paramList'];
        $checkSum = $data_for_request['checkSum'];
       
	    return view( 'front.paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
    }

    public function notify(Request $request)
    {
      
        $input = Session::get('input_data');
        $order_data = Session::get('order_data');
        $success_url = route('front.payment.return');
        $cancel_url = route('front.payment.cancle');
        $input_data = $request->all();
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('order_payment_id');

        if ($input_data['STATUS'] == 'TXN_SUCCESS') {
        
            if($payment_id == $input_data['ORDERID']){

                $donation = new Donation;
                $donation['donation_amount'] = $this->Currency($input['donation_amount']);
                $donation['payment_type'] = 'Paytm';
                $donation['email'] = $input['email'];
                $donation['fname'] = $input['fname'];
                $donation['lname'] = $input['lname'];
                $donation['number'] = $input['number'];
                $donation['donation_number'] = Str::random(4).time();
                $donation['address'] = $input['address'];
                $donation['currency'] = $input['currency_code'];;
                $donation['title'] = $order_data['title'];
                $donation['payment_status'] = "Completed";
                $donation['note'] = $input['note'];
                $donation['campaign_id'] = $input['campaign_id'];
                if($input['aninumasType'] == null){
                    $donation['type'] = 'aninumas';
                }else{
                    $donation['type'] = 'normal';
                }
                $donation['txnid'] = $request->TXNID;

               $donation->save();
               
                
                $donation->fill($input)->save();



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