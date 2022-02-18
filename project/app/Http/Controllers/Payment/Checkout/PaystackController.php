<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{
    Models\Campaign,
    Models\Notification,
    Models\Donation,
    Models\Currency,
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class PaystackController extends CheckoutBaseControlller
{
    public function store(Request $request)
    {
        $input = $request->all();
       
        $title = Campaign::findOrFail($request->campaign_id)->campaign_name;
       
        if($request->aninumasType == 1){
            $request->validate([
            'amount' => 'required',
            ]);
        }else{
            $request->validate([
                'amount' => 'required',
                'fname'  => 'required',
                'number' => 'required',
                'email'  => 'required',
                'address'=> 'required',
            ]);
        }
    
        $donation = new Donation;
        $success_url = route('front.payment.return');
        $donation['donation_amount'] = $this->Currency($request->amount);
        $donation['payment_type'] = 'Paystack';
        $donation['email'] = $request->email;
        $donation['fname'] = $request->fname;
        $donation['lname'] = $request->lname;
        $donation['number'] = $request->number;
        $donation['donation_number'] = Str::random(4).time();
        $donation['address'] = $request->address;
        $donation['currency'] = $request->currency_code;
        $donation['title'] = $title;
        $donation['payment_status'] = 'Completed';
        $donation['txnid'] = $request->txnid;
     
        $donation['note'] = $request->note;
        $donation['campaign_id'] = $request->campaign_id;
        if($request->aninumasType){
            $donation['type'] = 'aninumas';
        }else{
            $donation['type'] = 'normal';
        }
       
       $donation->save();
        
           //available_fund Update //
           $campaign = new Campaign;
           $before = $campaign->findOrFail($request->campaign_id)->available_fund;
           $after_fund = $before + $this->Currency($request->amount);
           $campaign->findOrFail($request->campaign_id)->update([
               'available_fund' => $after_fund
           ]);

        //Notification -----------//
        $notification = new Notification;
        $notification->donation_id = $request->campaign_id;
        $notification->save();
      
        return redirect($success_url);
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
