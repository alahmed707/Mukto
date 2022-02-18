<?php

namespace App\Http\Controllers\Payment\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Validator;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Currency;
use App\Models\Notification;
use App\Models\Generalsetting;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StripeController extends Controller
{
  public function __construct()
    {
        //Set Spripe Keys
        $stripe = Generalsetting::findOrFail(1);
        Config::set('services.stripe.key', $stripe->stripe_key);
        Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    public function store(Request $request){

       
        $title = Campaign::findOrFail($request->campaign_id)->campaign_name;
        $success_url = route('front.payment.return');

        if(Session::has('currency')){
            $currency = Currency::findOrFail(Session::get('currency'));
        }else{
            $currency = Currency::where('is_default',1)->first();
        }
     
        if($currency->name != 'USD'){
            return redirect()->back()->with('unsuccess',__('Invalid Currency For Stripe Payment.'));
        }


        //validation.........................//
        if($request->aninumasType){
            $validator = Validator::make($request->all(),[
            'cardNumber' => 'required',
            'cardCVC' => 'required',
            'month' => 'required',
            'year' => 'required',
            'donation_amount' => 'required',
            ]);


        }else{
            $validator = Validator::make($request->all(),[
                'cardNumber' => 'required',
                'cardCVC' => 'required',
                'month' => 'required',
                'year' => 'required',
                'donation_amount' => 'required',
                'fname'  => 'required',
                'number' => 'required',
                'email'  => 'required',
                'address'=> 'required',
            ]);
        }

        
       
        if ($validator->passes()) {
            
            $stripe = Stripe::make(Config::get('services.stripe.secret'));
            try{
             
                $token = $stripe->tokens()->create([
                    'card' =>[
                            'number' => $request->cardNumber,
                            'exp_month' => $request->month,
                            'exp_year' => $request->year,
                            'cvc' => $request->cardCVC,
                        ],
                    ]);

                if (!isset($token['id'])) {
                    return back()->with('error','Token Problem With Your Token.');
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' =>  $currency->name,
                    'amount' => $this->Currency($request->donation_amount),
                    'description' => $title,
                    ]);

    
            // donar data store..............//
                $donation = new Donation;

                if ($charge['status'] == 'succeeded') {
                    $donation['donation_amount'] = $this->Currency($request->donation_amount);
                    $donation['payment_type'] = 'stripe';
                    $donation['email'] = $request->email;
                    $donation['fname'] = $request->fname;
                    $donation['lname'] = $request->lname;
                    $donation['number'] = $request->number;
                    $donation['donation_number'] = Str::random(4).time();
                    $donation['address'] = $request->address;
                    $donation['currency'] = $currency->name;
                    $donation['title'] = $title;
                    $donation['payment_status'] = "Completed";
                    $donation['txnid'] = $charge['balance_transaction'];
                    $donation['charge_id'] = $charge['id'];
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
                    $after_fund = $before + $this->Currency($request->donation_amount);
                    $campaign->findOrFail($request->campaign_id)->update([
                        'available_fund' => $after_fund
                    ]);


                    //Notification -----------//
                    $notification = new Notification;
                    $notification->donation_id = $request->campaign_id;
                    $notification->save();

                    return redirect($success_url);

                }
                
            }catch (Exception $e){
                return back()->with('unsuccess', $e->getMessage());
            }catch (\Cartalyst\Stripe\Exception\CardErrorException $e){
                return back()->with('unsuccess', $e->getMessage());
            }catch (\Cartalyst\Stripe\Exception\MissingParameterException $e){
                return back()->with('unsuccess', $e->getMessage());
            }
        }
        return back()->with('unsuccess', 'Please Enter Valid Credit Card Informations.');
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
