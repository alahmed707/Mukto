<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{

    Models\PaymentGateway,
    Models\Campaign,
    Models\Currency,
    Models\Notification,
    Models\Donation,
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Twocheckout;
use Twocheckout_Charge;


class TwocheckoutController extends CheckoutBaseControlller
{
    public function store(Request $request)
    {
        $input = $request->all();
        
        if($request->aninumasType == 1){
            $request->validate([
            'donation_amount' => 'required',
            ]);


        }else{
            $request->validate([
                'donation_amount' => 'required',
                'fname'  => 'required',
                'lname'  => 'required',
                'number' => 'required',
                'email'  => 'required',
                'address'=> 'required',
            ]);
        }

      
        $currencies = Currency::where('is_default',1)->first()->name;

        if($request->aninumasType){
            $input['aninumasType'] = $request->aninumasType;
        }else{
            $input['aninumasType'] = null;
        }


        $item_number = Str::random(4).time();
        $item_amount = $input['donation_amount'];
        $success_url = route('front.payment.return');
        $item_name = $this->gs->title." Order";

        $data = PaymentGateway::whereKeyword('2checkout')->first();
        $paydata = $data->convertAutoData();
        if($request->aninumasType == 1){
            $name = 'aninumas Member';
            $email = 'aninumas@gmail.com';
            $number = '90000000';
            $address = 'aninumas Location';

        }else{
            $name = $request->fname ." ". $request->lname;
            $email = $request->email;
            $number = $request->number;
            $address = $request->address;
        }
Twocheckout::privateKey('BC2641D4-CE62-43D8-B2F7-861AC6BF1AC4');
Twocheckout::sellerId('901248204');

try {
    $charge = Twocheckout_Charge::auth(array(
        "sellerId" => "901248204",
        "merchantOrderId" => "123",
        "token" => 'MjFiYzIzYjAtYjE4YS00ZmI0LTg4YzYtNDIzMTBlMjc0MDlk',
        "currency" => 'USD',
        "total" => '10.00',
        "billingAddr" => array(
            "name" => 'Testing Tester',
            "addrLine1" => '123 Test St',
            "city" => 'Columbus',
            "state" => 'OH',
            "zipCode" => '43123',
            "country" => 'USA',
            "email" => 'testingtester@2co.com',
            "phoneNumber" => '555-555-5555'
        ),
        "shippingAddr" => array(
            "name" => 'Testing Tester',
            "addrLine1" => '123 Test St',
            "city" => 'Columbus',
            "state" => 'OH',
            "zipCode" => '43123',
            "country" => 'USA',
            "email" => 'testingtester@2co.com',
            "phoneNumber" => '555-555-5555'
        )
    ));
            $this->assertEquals('APPROVED', $charge['response']['responseCode']);
        } catch (Twocheckout_Error $e) {
            $this->assertEquals('Unauthorized', $e->getMessage());
        }

    }

    private function Currency($value)
    {
        $currency = Currency::where('is_default',1)->first();
        $amount =  $value / $currency->value;
        return round($amount,2);
    }
}
