<?php

namespace App\Http\Controllers\Front;

use App\{
    Models\PaymentGateway
};
use DB;
use Auth;
use Session;


class CheckoutController extends FrontBaseController
{
    // Loading Payment Gateways

    public function loadpayment($slug1,$slug2)
    {
        $curr = $this->curr;
        $payment = $slug1;
        $pay_id = $slug2;
        $gateway = '';
        if($pay_id != 0) {
            $gateway = PaymentGateway::findOrFail($pay_id);
        }
        return view('load.payment',compact('payment','pay_id','gateway','curr'));
    }

    
    // Redirect To Success Page If Payment is Comleted

     public function payreturn(){
        return view('front.success');
     }
     
        public function paycancle(){
        return redirect(route('front.index'));
     }
}