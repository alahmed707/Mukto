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

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Razorpay\Api\Api;

class RazorpayController extends CheckoutBaseControlller
{
    public function __construct()
    {
        parent::__construct();
        $data = PaymentGateway::whereKeyword('razorpay')->first();
        $paydata = $data->convertAutoData();
        $this->keyId = $paydata['key'];
        $this->keySecret = $paydata['secret'];
        $this->displayCurrency = 'INR';
        $this->api = new Api($this->keyId, $this->keySecret);
    }


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
        $notify_url = route('front.razorpay.notify');


        $orderData = [
            'receipt'         => $order['title'],
            'amount'          => $order['item_amount'] * 100,
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];
        
        $razorpayOrder = $this->api->order->create($orderData);
        
        Session::put('input_data',$input);
        Session::put('order_data',$order);
        Session::put('order_payment_id', $razorpayOrder['id']);

        $displayAmount = $amount = $orderData['amount'];
                    
        if ($this->displayCurrency !== 'INR')
        {
            $url = "https://api.fixer.io/latest?symbols=$this->displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);
        
            $displayAmount = $exchange['rates'][$this->displayCurrency] * $amount / 100;
        }
        
        $checkout = 'automatic';
        
        if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
        {
            $checkout = $_GET['checkout'];
        }
        
        $data = [
            "key"               => $this->keyId,
            "amount"            => $amount,
            "name"              => $order['title'],
            "description"       => $order['title'],
            "prefill"           => [
                "name"              => $request->customer_name,
                "email"             => $request->customer_email,
                "contact"           => $request->customer_phone,
            ],
            "notes"             => [
                "address"           => $request->customer_address,
                "merchant_order_id" => $order['item_number'],
            ],
            "theme"             => [
                "color"             => "{{$this->gs->colors}}"
            ],
            "order_id"          => $razorpayOrder['id'],
        ];
        
        if ($this->displayCurrency !== 'INR')
        {
            $data['display_currency']  = $this->displayCurrency;
            $data['display_amount']    = $displayAmount;
        }
        
        $json = json_encode($data);
        $displayCurrency = $this->displayCurrency;
        
        return view( 'front.razorpay-checkout', compact( 'data','displayCurrency','json','notify_url' ) );
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

        $success = true;

        if (empty($input_data['razorpay_payment_id']) === false)
        {
        
            try
            {
                $attributes = array(
                    'razorpay_order_id' => $payment_id,
                    'razorpay_payment_id' => $input_data['razorpay_payment_id'],
                    'razorpay_signature' => $input_data['razorpay_signature']
                );
        
                $this->api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
            }
        }

        if ($success === true){
        
        
            $donation = new Donation;
            $donation['donation_amount'] = $this->Currency($input['donation_amount']);
            $donation['payment_type'] = 'Razorpay';
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
            $donation['txnid'] = $payment_id;

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


                Session::forget('order_data');
                Session::forget('input_data');
               
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