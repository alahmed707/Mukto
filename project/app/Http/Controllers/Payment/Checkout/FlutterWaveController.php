<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{
    Models\PaymentGateway,
    Models\Campaign,
    Models\Currency,
    Models\Generalsetting,
    Models\Notification,
    Models\Donation
};
use App\Http\Controllers\Payment\Checkout\CheckoutBaseControlller;

use Illuminate\Http\Request;
use Session;
use App\Helpers\OrderHelper;
use Illuminate\Support\Str;


class FlutterWaveController extends CheckoutBaseControlller
{
    public $public_key;
    private $secret_key;

    public function __construct()
    {
        parent::__construct();
        $data = PaymentGateway::whereKeyword('flutterwave')->first();
        $paydata = $data->convertAutoData();
        $this->public_key = $paydata['public_key'];
        $this->secret_key = $paydata['secret_key'];
    }


    public function store(Request $request)
    {

        $available_currency = OrderHelper::flutter_currencies();

        if(!in_array($this->curr->name,$available_currency))
        {
            return redirect()->back()->with('unsuccess',__('Invalid Currency For Flutter Wave.'));
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



        $order['item_name'] = $this->gs->title." Order";
        $order['item_number'] = Str::random(4).time();
        $order['item_amount'] = $request->donation_amount;
        $cancel_url = route('front.payment.cancle');
        $notify_url = route('front.flutter.notify');

        

        Session::put('input_data',$input);
        Session::put('order_data',$order);
        Session::put('order_payment_id', $order['item_number']);

        // SET CURL

        $curl = curl_init();
        if($request->email){
            $customer_email = $request->email;
        }else{
            $customer_email = 'aninumas@gmail.com';
        }
            
        $amount = $order['item_amount'];  
        $currency = $this->curr->name;
        $txref = $order['item_number']; // ensure you generate unique references per transaction.
        $PBFPubKey = $this->public_key; // get your public key from the dashboard.
        $redirect_url = $notify_url;
        $payment_plan = ""; // this is only required for recurring payments.
        
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode([
            'amount' => $amount,
            'customer_email' => $customer_email,
            'currency' => $currency,
            'txref' => $txref,
            'PBFPubKey' => $PBFPubKey,
            'redirect_url' => $redirect_url,
            'payment_plan' => $payment_plan
          ]),
          CURLOPT_HTTPHEADER => [
            "content-type: application/json",
            "cache-control: no-cache"
          ],
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        if($err){
          // there was an error contacting the rave API
          return redirect($cancel_url)->with('unsuccess','Curl returned error: ' . $err);
        }
        
        $transaction = json_decode($response);
        
        if(!$transaction->data && !$transaction->data->link){
          // there was an error from the API
          return redirect($cancel_url)->with('unsuccess','API returned error: ' . $transaction->message);
        }
        
       
        return redirect($transaction->data->link);

    }


    public function notify(Request $request)
    {
         
      
        $input = Session::get('input_data');
        $order_data = Session::get('order_data');
        $success_url = route('front.payment.return');
        $cancel_url = route("front.payment.cancle");
        $input_data = $request->all();
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('order_payment_id');
      
        $input_data = json_decode($request->resp,true);
      
        if (isset($input_data['data']) && $input_data['data']['status'] == 'success') {
            $ref = $payment_id;

            $query = array(
                "SECKEY" => $this->secret_key,
                "txref" => $ref
            );

            $data_string = json_encode($query);
                
            $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
            $response = curl_exec($ch);
    
            curl_close($ch);
    
            $resp = json_decode($response, true);
            if($resp['status'] == 'error'){
                return redirect($cancel_url);
            }
           
            if ($resp['status'] = "success") {
            
                $paymentStatus = $resp['data']['status'];
                $chargeResponsecode = $resp['data']['chargecode'];
        
                if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($paymentStatus == "successful")) {


                    $donation = new Donation;
                    $donation['donation_amount'] = $this->Currency($input['donation_amount']);
                    $donation['payment_type'] = 'Flutter Wave';
                    $donation['email'] = $input['email'];
                    $donation['fname'] = $input['fname'];
                    $donation['lname'] = $input['lname'];
                    $donation['number'] = $input['number'];
                    $donation['donation_number'] = $order_data['item_number'];
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
                    $donation['txnid'] = $resp['data']['txid'];

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

                Session::forget('order_payment_id');
                Session::forget('input_data');
                Session::forget('order_data');

                return redirect($success_url);
            }
        }
        return redirect($cancel_url);
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