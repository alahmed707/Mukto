<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{
    Models\Currency,
    Models\Donation,
    Models\Campaign,
    Models\Notification,
    Models\PaymentGateway
};
use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

class AuthorizeController extends CheckoutBaseControlller
{

    public function store(Request $request){
        
        if(Session::has('currency')){
            $currency = Currency::findOrFail(Session::get('currency'));
        }else{
            $currency = Currency::where('is_default',1)->first();
        }
     
        if($currency->name != 'USD'){
            return redirect()->back()->with('unsuccess',__('Invalid Currency For Authorize.net Payment.'));
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
    
        $item_name = $this->gs->title." Order";
        $item_number = Str::random(4).time();
        $item_amount = $request->donation_amount;
      
        $validator = Validator::make($request->all(),[
                        'cardNumber' => 'required',
                        'cardCode' => 'required',
                        'month' => 'required',
                        'year' => 'required',
                    ]);

        if ($validator->passes()) {
       
            $data = PaymentGateway::whereKeyword('authorize.net')->first();
            $paydata = $data->convertAutoData();

           
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName($paydata['login_id']);
            $merchantAuthentication->setTransactionKey($paydata['txn_key']);

            // Set the transaction's refId
            $refId = 'ref' . time();

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($request->cardNumber);
            $year = $request->year;
            $month = $request->month;
            $creditCard->setExpirationDate($year.'-'.$month);
            $creditCard->setCardCode($request->cardCode);
          
            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);
        
            // Create order information
            $order = new AnetAPI\OrderType();
            $order->setInvoiceNumber($item_number);
            $order->setDescription($item_name);

            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction"); 
            $transactionRequestType->setAmount($item_amount);
            $transactionRequestType->setOrder($order);
            $transactionRequestType->setPayment($paymentOne);
            // Assemble the complete transaction request
            $requestt = new AnetAPI\CreateTransactionRequest();
            $requestt->setMerchantAuthentication($merchantAuthentication);
            $requestt->setRefId($refId);
            $requestt->setTransactionRequest($transactionRequestType);
          
            // Create the controller and get the response
            $controller = new AnetController\CreateTransactionController($requestt);
            ;
            if($paydata['sandbox_check'] == 1){
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
                // dd($response->getMessages()->getResultCode());
            }
            else {
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);                
            }

            $input = $request->all();

            if ($response != null) {
                // Check to see if the API request was successfully received and acted upon

                if ($response->getMessages()->getResultCode() == "Ok") {
                    // Since the API request was successful, look for a transaction 
                    // and parse it to display the results of authorizing the card
                    $tresponse = $response->getTransactionResponse();
                 
                    if ($tresponse != null && $tresponse->getMessages() != null) {

                        $success_url = route('front.payment.return');
                        $cancel_url = route('front.payment.cancle');
                        $title = Campaign::findOrFail($request->campaign_id)->campaign_name;
                    $donation = new Donation;
                     $donation['donation_amount'] = $this->Currency($input['donation_amount']);
                     $donation['payment_type'] = 'Authorize';
                     $donation['email'] = $input['email'];
                     $donation['fname'] = $input['fname'];
                     $donation['lname'] = $input['lname'];
                     $donation['number'] = $input['number'];
                     $donation['donation_number'] = Str::random(4).time();
                     $donation['address'] = $input['address'];
                     $donation['currency'] = $input['currency_code'];;
                     $donation['title'] = $title ;
                     $donation['payment_status'] = "Completed";
                     $donation['note'] = $input['note'];
                     $donation['campaign_id'] = $input['campaign_id'];
                     if($request->aninumasType){
                         $donation['type'] = 'aninumas';
                     }else{
                         $donation['type'] = 'normal';
                     }
                     $donation['txnid'] = $tresponse->getTransId();

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



                    return redirect($success_url);

                    } else {
                        return back()->with('unsuccess', __('Payment Failed.'));
                    }
                    // Or, print errors if the API request wasn't successful
                } else {
                    return back()->with('unsuccess', __('Payment Failed.'));
                }      
            } else {
                return back()->with('unsuccess', __('Payment Failed.'));
            }

        }
        return back()->with('unsuccess', __('Invalid Payment Details.'));
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