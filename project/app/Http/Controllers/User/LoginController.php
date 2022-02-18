<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use App;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
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

    public function showLoginForm()
    {
      $this->code_image();
      return view('user.login');
    }

    public function login(Request $request)
    {
      //  dd(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember));
        //--- Validation Section
        $rules = [
                  'email'   => 'required|email',
                  'password' => 'required'
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

      // Attempt to log the user in
      if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location

        // Check If Email is verified or not
          if(Auth::guard('web')->user()->email_verified == 'No')
          {
            Auth::guard('web')->logout();
            return response()->json(array('errors' => [ 0 => __('Your Email is not Verified!') ]));   
          }
          return response()->json(route('user-dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
          return response()->json(array('errors' => [ 0 => __("Credentials Doesn\'t Match !") ]));     
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    // Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = base_path('../assets/front/fonts/NotoSans-Bold.ttf');
        // dd($font);
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        // dd($letter);
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
          // dd($font);
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, base_path('../assets/images/capcha_code.png'));
    }

}
