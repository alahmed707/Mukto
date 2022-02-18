<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $fillable = ['title', 'details', 'subtitle', 'name', 'type', 'information'];
    public $timestamps = false;

    public function convertAutoData(){
        return  json_decode($this->information,true);
    }

    public function getAutoDataText(){
        $text = $this->convertAutoData();
        return end($text);
    }

    public function showKeyword(){
        $data = $this->keyword == null ? 'other' : $this->keyword;
        return $data;
    }

    public function showCheckoutLink(){
        $link = '';
        $data = $this->keyword == null ? 'other' : $this->keyword;
        if($data == 'paypal'){
            $link = route('front.paypal.submit');
        }else if($data == 'stripe'){
            $link = route('front.stripe.submit');
        }else if($data == 'instamojo'){
            $link = route('front.instamojo.submit');
        }else if($data == 'paystack'){
            $link = route('front.paystack.submit');
        }else if($data == 'paytm'){
            $link = route('front.paytm.submit');
        }else if($data == 'mollie'){
            $link = route('front.molly.submit');
        }else if($data == 'razorpay'){
            $link = route('front.razorpay.submit');
        }else if($data == 'authorize.net'){
            $link = route('front.authorize.submit');
        }else if($data == 'mercadopago'){
            $link = route('front.mercadopago.submit');
        }else if($data == 'flutterwave'){
            $link = route('front.flutter.submit');
        }else if($data == '2checkout'){
            $link = route('front.twocheckout.submit');
        }else if($data == 'sslcommerz'){
            $link = route('front.ssl.submit');
        }else if($data == 'voguepay'){
            $link = route('front.voguepay.submit');
        }else if($data == 'cod'){
            $link = route('front.cod.submit');
        }else{
            $link = route('front.manual.submit');
        }
        return $link;
    }

    public function showForm(){
        $show = '';
        $data = $this->keyword == null ? 'other' : $this->keyword;
        $values = ['cod','voguepay','sslcommerz','flutterwave','razorpay','mollie','paytm','paystack','paypal','instamojo'];
        if (in_array($data, $values)){
            $show = 'no';
        }else{
            $show = 'yes';
        }
        return $show;
    }
}