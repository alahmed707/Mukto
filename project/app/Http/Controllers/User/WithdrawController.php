<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Currency;
use App\Models\Campaign;
use App\Models\Generalsetting;
use App\Models\Withdraw;
use App\Models\Notification;
use DB;
use Illuminate\Support\Facades\Session;
use App;


class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');

        $this->middleware(function ($request, $next) {

            // Set Global Language

            if (Session::has('language')) 
            {
                $this->language = DB::table('languages')->find(Session::get('language'));
            }
            else
            {
                $this->language = DB::table('languages')->where('is_default','=',1)->first();
            }  
            view()->share('langg', $this->language);
            App::setlocale($this->language->name);
    
            // Set Global Currency
    
            if (Session::has('currency')) {
                $this->curr = DB::table('currencies')->find(Session::get('currency'));
            }
            else {
                $this->curr = DB::table('currencies')->where('is_default','=',1)->first();
            }
    
            // Set Popup
    
            if (!Session::has('popup')) 
            {
                view()->share('visited', 1);
            }
            Session::put('popup' , 1);


            return $next($request);
        });
    }

  	public function index()
    {
        $withdraws = Withdraw::where('user_id','=',Auth::guard('web')->user()->id)->orderBy('id','desc')->get();     
        return view('user.withdraw.index',compact('withdraws'));
    }


    public function create()
    {
        $sign = Currency::where('is_default','=',1)->first();
        return view('user.withdraw.withdraw' ,compact('sign'));
    }

    public function store(Request $request)
    {
        $from = Campaign::findOrFail($request->campaign_id);
        $withdrawcharge = Generalsetting::findOrFail(1);
        $charge = $withdrawcharge->withdraw_fee;
        if($request->amount > 0){
            $amount = $this->Currency($request->amount);
            if ($from->available_fund >= $amount){
                $fee = (($withdrawcharge->withdraw_charge / 100) * $amount) + $charge;
                $finalamount = $amount - $fee;
                if($finalamount < 1){
                    return response()->json(array('errors' => [ 0 => __('Insufficient Balance.') ])); 
                }
                if ($from->available_fund >= $finalamount){
                $finalamount = number_format((float)$finalamount,2,'.','');

                $from->available_fund = $from->available_fund - $amount;
                $from->update();

                $newwithdraw = new Withdraw();
                $newwithdraw['user_id'] = Auth::guard('web')->user()->id;
                $newwithdraw['method'] = $request->methods;
                $newwithdraw['acc_email'] = $request->acc_email;
                $newwithdraw['iban'] = $request->iban;
                $newwithdraw['country'] = $request->acc_country;
                $newwithdraw['acc_name'] = $request->acc_name;
                $newwithdraw['address'] = $request->address;
                $newwithdraw['swift'] = $request->swift;
                $newwithdraw['reference'] = $request->reference;
                $newwithdraw['amount'] = $this->Currency($finalamount);
                $newwithdraw['campaign_id'] = $request->campaign_id;
                $newwithdraw['fee'] = $fee;
                $newwithdraw->save();
                
                $notification = new Notification;
                $notification->withdrow_id = $newwithdraw->id;
                $notification->save();

                return response()->json(__('Withdraw Request Sent Successfully.')); 
            }else{
                return response()->json(array('errors' => [ 0 => __('Insufficient Balance.') ])); 

            }
            }else{
                return response()->json(array('errors' => [ 0 => __('Insufficient Balance.') ])); 
            }
        }
            return response()->json(array('errors' => [ 0 => __('Please enter a valid amount.') ])); 
    }


    private function Currency($value)
    {
        $currency = Currency::where('is_default',1)->first();
        $amount =  $value / $currency->value;
        return round($amount,2);
    }
}
