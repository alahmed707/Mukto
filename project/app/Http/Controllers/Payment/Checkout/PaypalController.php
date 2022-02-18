<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\PaymentGateway;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;

class PaypalController extends Controller
{

    private $_api_context;
 
    public function __construct()
    {
     
        $data = PaymentGateway::whereKeyword('paypal')->first();
        $paydata = $data->convertAutoData();
        $paypal_conf = Config::get('paypal');
        
        $paypal_conf['client_id'] = $paydata['client_id'];
        $paypal_conf['secret'] = $paydata['client_secret'];
        $paypal_conf['settings']['mode'] = $paydata['sandbox_check'] == 1 ? 'sandbox' : 'live';
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

        
    }


 public function store(Request $request){
    
    if(Session::has('currency')){
        $curr = Currency::findOrFail(Session::get('currency'));
    }else{
        $curr = Currency::where('is_default',1)->first();
    }

    if($curr->name != 'USD'){
        return redirect()->back()->with('unsuccess',__('Invalid Currency For Paypal Payment.'));
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
    
    $title = Campaign::findOrFail($request->campaign_id)->campaign_name;
    $donation['item_number'] = Str::random(4).time();
    $donation['donation_amount'] = $this->Currency($request->donation_amount);
    $cancel_url = route('front.payment.cancle');
    $notify_url = route('front.paypal.notify');
 
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
    $item_1 = new Item();
    $item_1->setName($title) /** item name **/
        ->setCurrency($curr->name)
        ->setQuantity(1)
        ->setPrice($request->donation_amount); /** unit price **/
    $item_list = new ItemList();
    $item_list->setItems(array($item_1));
    $amount = new Amount();
    $amount->setCurrency($curr->name)
        ->setTotal($request->donation_amount);
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription($title.' Via Paypal');
    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl($notify_url) /** Specify return URL **/
        ->setCancelUrl($cancel_url);
    $payment = new Payment();
    $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
   
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            return redirect()->back()->with('unsuccess',$ex->getMessage());
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
       
    /** add payment ID to session **/
          Session::put('paypal_data',$input);
          Session::put('order_data',$donation);
          Session::put('paypal_payment_id', $payment->getId());
    if (isset($redirect_url)) {
        /** redirect to paypal **/
        return Redirect::away($redirect_url);
    }
    return redirect()->back()->with('unsuccess','Unknown error occurred');

          if (isset($redirect_url)) {
              /** redirect to paypal **/
              return Redirect::away($redirect_url);
          }
          return redirect()->back()->with('unsuccess','Unknown error occurred');

 }

     public function paycancle(){
         return redirect()->back()->with('unsuccess','Payment Cancelled.');
     }

     public function payreturn(){
         return view('front.success');
     }


     public function notify(Request $request)
     {

         $paypal_data = Session::get('paypal_data');
         $order_data = Session::get('order_data');
         $success_url = route('front.payment.return');
         $cancel_url = route('front.payment.cancle');
         $input = $request->all();
         /** Get the payment ID before session clear **/
         $payment_id = Session::get('paypal_payment_id');
         /** clear the session payment ID **/
         if (empty( $input['PayerID']) || empty( $input['token'])) {
             return redirect($cancel_url);
         } 
         $payment = Payment::get($payment_id, $this->_api_context);
         $execution = new PaymentExecution();
         $execution->setPayerId($input['PayerID']);
         /**Execute the payment **/
         $result = $payment->execute($execution, $this->_api_context);
       
         if ($result->getState() == 'approved') {
             $resp = json_decode($payment, true);
                     $settings = Generalsetting::findOrFail(1);
                     $donation = new Donation;
                     $donation['donation_amount'] = $this->Currency($paypal_data['donation_amount']);
                     $donation['payment_type'] = 'paypal';
                     $donation['email'] = $paypal_data['email'];
                     $donation['fname'] = $paypal_data['fname'];
                     $donation['lname'] = $paypal_data['lname'];
                     $donation['number'] = $paypal_data['number'];
                     $donation['donation_number'] = Str::random(4).time();
                     $donation['address'] = $paypal_data['address'];
                     $donation['currency'] = $paypal_data['currency_code'];;
                     $donation['title'] = $resp['transactions'][0]['description'];
                     $donation['payment_status'] = "Completed";
                     $donation['note'] = $paypal_data['note'];
                     $donation['campaign_id'] = $paypal_data['campaign_id'];
                     if($request->aninumasType){
                         $donation['type'] = 'aninumas';
                     }else{
                         $donation['type'] = 'normal';
                     }
                     $donation['txnid'] = $resp['transactions'][0]['related_resources'][0]['sale']['id'];

                    $donation->save();
                    

                //available_fund Update //
                  $campaign = new Campaign;
                  $before = $campaign->findOrFail($paypal_data['campaign_id'])->available_fund;
                  $after_fund = $before + $this->Currency($paypal_data['donation_amount']);
                  $campaign->findOrFail($paypal_data['campaign_id'])->update([
                      'available_fund' => $after_fund
                  ]);
  
  
                  //Notification -----------//
                  $notification = new Notification;
                  $notification->donation_id = $paypal_data['campaign_id'];
                  $notification->save();

                
            Session::forget('paypal_data');
        
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
