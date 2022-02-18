<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use Auth;
use Validator;
use Session;
use DB;
use App;


class RegisterController extends Controller
{
    public function __construct()
        {
             $this->gs = DB::table('generalsettings')->find(1);
    
            // Set Global PageSettings
    
            $this->ps = DB::table('pagesettings')->find(1);
    
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

    public function register(Request $request)
    {
        $value = session('captcha_string');
        if ($request->codes != $value){
            return response()->json(array('errors' => [ 0 =>  __('Please enter Correct Capcha Code.') ]));    
        }

        //--- Validation Section

        $rules = [
                'email'   => 'required|email|unique:users',
                'password' => 'required|confirmed'
                ];

                $custom = [
                    'email.unique' => __('This email has already been taken.')
                ];
        $validator = Validator::make($request->all(), $rules,$custom);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

            $gs = Generalsetting::findOrFail(1);
            $user = new User;
            $input = $request->all();        
            $input['password'] = bcrypt($request['password']);
            $token = md5(time().$request->name.$request->email);
            $input['verification_link'] = $token;
            $user->fill($input)->save();

            if($gs->is_verification_email == 1)
            {
            $to = $request->email;
            $subject = 'Verify your email address.';
            $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('user/register/verify/'.$token).">Simply click here to verify. </a>";
            //Sending Email To Customer
            if($gs->is_smtp == 1)
            {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
            }
            else
            {
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            mail($to,$subject,$msg,$headers);
            
            }
            return response()->json(__('We need to verify your email address. We have sent an email to'). ' '.$to. ' '  .__('to verify your email address. Please click link in that email to continue.'));
            }
            else {
            $user->email_verified = 'Yes';
            $user->update();
            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();
            Auth::guard('web')->login($user);   
            $data[0] = 1;
            $data[1] = redirect()->intended(route('user-dashboard'))->getTargetUrl();
            return response()->json($data);
            }

    }

    public function token($token)
    {
        
        
       $gs = Generalsetting::findOrFail(1);

        if($gs->is_verification_email == 1)
        {      
            $user = User::where('verification_link',$token)->first();
            if(isset($user))
            { 
                $user->email_verified = 'Yes';
                $user->update();


            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();
            Auth::guard('web')->login($user); 
            return redirect()->route('user-dashboard')->with('success',__('Email Verified Successfully'));
        }
            }
            else {
            return redirect()->back();  
            }
    }
}
