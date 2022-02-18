<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\AdminUserConversation;
use App\Models\AdminUserMessage;
use App\Models\Generalsetting;
use App\Models\Notification;
use DB;
use Session;
use App;

class MessageController extends Controller
{
 
    public function __construct()
        {
            $this->middleware('auth');
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


    public function adminmessages()
    {
            $user = Auth::guard('web')->user();
            $convs = AdminUserConversation::where('user_id','=',$user->id)->get();
            return view('user.message.index',compact('convs'));            
    }

    public function messageload($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            return view('load.usermessage',compact('conv'));                 
    }   

    public function adminmessage($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            return view('user.message.create',compact('conv'));                 
    }   


    public function adminmessagedelete($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }

            
            if($conv->notifications->count() > 0)
            {
                foreach ($conv->notifications as $key) {
                    $key->delete();
                }
            }

            if($conv->adminnotifications->count() > 0)
            {
                foreach ($conv->adminnotifications as $key) {
                    $key->delete();
                }
            }
            
            $conv->delete();
            return redirect()->back()->with('success',__('Message Deleted Successfully'));                 
    }

    public function adminpostmessage(Request $request)
    {

        $msg = new AdminUserMessage();
        $input = $request->all();  
        $msg->fill($input)->save();
        //--- Redirect Section    
        $notification = new Notification;
        $notification->conversation_id = $request->conversation_id;
        $notification->save();

        $msg = 'Message Sent!';
        



        return response()->json($msg);      
        //--- Redirect Section Ends  
    }

    public function adminusercontact(Request $request)
    {
        $data = 1;
        $user = Auth::guard('web')->user();        
        $gs = Generalsetting::findOrFail(1);
        $ps =  DB::table('pagesettings')->find(1);
        $subject = $request->subject;
        $to = $ps->contact_email;
        $from = $user->email;
        $msg = "Email: ".$from."\nMessage: ".$request->message;
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

    $conv = AdminUserConversation::where('user_id','=',$user->id)->where('subject','=',$subject)->first();
        if(isset($conv)){
            $msg = new AdminUserMessage();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json(__('Message Send!'));   
        }
        else{
            $message = new AdminUserConversation();
            $message->subject = $subject;
            $message->user_id= $user->id;
            $message->message = $request->message;
            $message->save();

            $notification = new Notification;
            $notification->conversation_id = $message->id;
            $notification->save();

            $msg = new AdminUserMessage();

            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json(__('Message Send!'));   
        }
}
}
