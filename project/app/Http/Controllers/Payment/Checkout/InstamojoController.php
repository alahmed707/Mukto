<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{
    Models\Cart,
    Models\Order,
    Classes\Instamojo,
    Classes\GeniusMailer,
    Models\PaymentGateway
};
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Notification;

use App\Models\Currency;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use OrderHelper;

class InstamojoController extends CheckoutBaseControlller
{

    public function store(Request $request)
    {
        $data = PaymentGateway::whereKeyword('instamojo')->first();
        $paydata = $data->convertAutoData();
      
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
    

        if($this->curr->name != "INR")
        {
            return redirect()->back()->with('unsuccess',__('Please Select INR Currency For This Payment.'));
         }
        $input = $request->all();

        if($request->aninumasType){
           $input['aninumasType'] = $request->aninumasType;
        }else{
           $input['aninumasType'] = null;
        }
       
        $order['item_name'] = $this->gs->title." Order";
        $order['item_number'] = Str::random(4).time();
        $order['item_amount'] = $request->donation_amount;
       
        $cancel_url = route('front.payment.cancle');
        $notify_url = route('front.instamojo.notify');
      
         
        if($paydata['sandbox_check'] == 1){
        $api = new Instamojo($paydata['key'], $paydata['token'], 'https://test.instamojo.com/api/1.1/');
        }
        else {
        $api = new Instamojo($paydata['key'], $paydata['token']);
        }
      
    
        try {
          
            $response = $api->paymentRequestCreate(array(
                "purpose" => $order['item_name'],
                "amount" => $order['item_amount'],
                "send_email" => false,
                "email" =>  null,
                "redirect_url" => $notify_url
            ));

        
          
        $redirect_url = $response['longurl'];
        /** add payment ID to session **/
        Session::put('input_data',$input);
        
        Session::put('order_payment_id', $response['id']);
          
        return redirect($redirect_url);

        }
        catch (Exception $e) {
           
            return redirect($cancel_url)->with('unsuccess','Error: ' . $e->getMessage());
        }
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

        if ($input_data['payment_request_id'] == $payment_id) {
            $data = Session::get('input_data');
            $paymentId = Session::get('order_payment_id');
            

            $title = Campaign::findOrFail($data['campaign_id'])->campaign_name;
      
                     $donation = new Donation;
                     $donation['donation_amount'] = $this->Currency($data['donation_amount']);
                     $donation['payment_type'] = 'Instamojo';
                     $donation['email'] = $data['email'];
                     $donation['fname'] = $data['fname'];
                     $donation['lname'] = $data['lname'];
                     $donation['number'] = $data['number'];
                     $donation['donation_number'] = Str::random(4).time();
                     $donation['address'] = $data['address'];
                     $donation['currency'] = $data['currency_code'];;
                     $donation['title'] = $title;
                    $donation['payment_status'] = 'Completed';
                  
                     $donation['note'] = $data['note'];
                     $donation['campaign_id'] = $data['campaign_id'];
                     if($data['aninumasType'] != null){
                         $donation['type'] = 'aninumas';
                     }else{
                         $donation['type'] = 'normal';
                     }
                     $donation['txnid'] = $paymentId;

                    $donation->save();

            //available_fund Update //
            $campaign = new Campaign;
            $before = $campaign->findOrFail($data['campaign_id'])->available_fund;
            $after_fund = $before + $this->Currency($data['donation_amount']);
            $campaign->findOrFail($data['campaign_id'])->update([
                'available_fund' => $after_fund
            ]);


           
         //Notification -----------//
         $notification = new Notification;
         $notification->donation_id = $data['campaign_id'];
         $notification->save();

         Session::forget('input_data');
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
