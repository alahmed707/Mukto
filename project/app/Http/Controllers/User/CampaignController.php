<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Campaign;
use App\Models\Withdraw;
use App\Models\Notification;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use App;

class CampaignController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:web');

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

    //*** GET Request
    public function index()
    {
        return view('user.campaign.index');
    }

    //*** GET Request
    public function CreateCampaign()
    {
        $categorys = Category::all();
        return view('user.campaign.create',compact('categorys'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'mimes:jpeg,jpg,png,svg',
            'campaign_name'      => 'required',
            'category_id'      => 'required',
            'description'      => 'required',
            'slug' => 'unique:campaigns|regex:/^[a-zA-Z0-9\s-]+$/'
             ];

            $customs = [
                'slug.unique' => __('This slug has already been taken.'),
                'slug.regex' => __('Slug Must Not Have Any Special Characters.')
                       ];

     $validator = Validator::make($request->all(), $rules);
    
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }

     //--- Validation Section Ends
     $input = $request->all();
        //--- Logic Section
        if(Auth::user()->id){
          $input['user_id'] = Auth::user()->id;
          $input['is_panding'] = 0;
          $input['status'] = 'open';
        }

        $input['goal'] = $this->Currency($request->goal);  

        $common_rep   = ["value", "{", "}", "[","]",":","\""];
        $preload = str_replace($common_rep, '', $request->preloaded_amount);

        
        if ($preload[0]  != null) 
        {
            $prelod = array();
            foreach (explode(',',$preload[0]) as $key => $value) {
                $prelod[$key] = $this->currency($value);
            }
           $input['preloaded_amount'] = implode(',', $prelod );  
             
        }
       else {
           $input['preloaded_amount'] = null;
        }



        $tags = str_replace($common_rep, '', $request->tags);

        if (!empty($request->tags)) 
        {
        //    dd($tags);
           $input['tags'] =$tags;  
             
        }
       else {
           $input['tags'] = null;
        }  



        if ($request->featured == 1) 
        { 
           $input['featured'] = 1;       
        }else{
            $input['featured'] = 0; 
        }

        if ($request->send_newsletter== 1) 
        {
           $input['send_newsletter'] = 1;
                 
        }else{
            $input['send_newsletter'] = 0;
        }
     if ($file = $request->file('photo')) 
            {     
                $name = time().$file->getClientOriginalName();
               
                $file->move('assets/images/campaign',$name);
                         
            $input['photo'] = $name;
            
            } 


            if($request->secheck){
                $input['secheck'] = 1;
                if($request->meta_tag){
                    
                    $meta_tags = str_replace($common_rep, '', $request->meta_tag);
                    $input['meta_tag'] = $meta_tags;
                }
        
                if($request->meta_description){
                    $input['meta_description'] = $request->meta_description;
                }
            }else{
                $input['meta_description'] = null;
                $input['meta_tag'] = null;
            }
     
        $data = new Campaign();
        $id = $data->create($input)->id;

        $notification = new Notification;
        $notification->campaign_id = $id ;
        $notification->save();
        //--- Logic Section Ends
            
        //--- Redirect Section        
        $msg = __('New Data Added Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function EditCampaign($id)
    {   $categorys = Category::all();
        $data = Campaign::findOrFail($id);
        return view('user.campaign.edit',compact('data','categorys'));
    }


   

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'mimes:jpeg,jpg,png,svg',
            'campaign_name'      => 'required',
            'category_id'      => 'required',
            'description'      => 'required',
            'slug' => 'unique:campaigns,slug,'.$id.'|regex:/^[a-zA-Z0-9\s-]+$/'
             ];

            $customs = [
                'slug.unique' => __('This slug has already been taken.'),
                'slug.regex' => __('Slug Must Not Have Any Special Characters.')
                       ];

     $validator = Validator::make($request->all(), $rules,$customs);
     
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }
     //--- Validation Section Ends

        //--- Logic Section
        
        $input = $request->all();
        $data = Campaign::findOrFail($id);
        $input = $request->all();
        $input['photo'] = $data->photo;
        $common_rep   = ["value", "{", "}", "[","]",":","\""];

        $preload = str_replace($common_rep, '', $request->preloaded_amount);
        
        if ($preload[0]  != null) 
        {
            $prelod = array();
            foreach (explode(',',$preload[0]) as $key => $value) {
                $prelod[$key] = $this->currency($value);
            }
           $input['preloaded_amount'] = implode(',', $prelod );  
             
        }
       else {
           $input['preloaded_amount'] = null;
        }
       
        
        $tags = str_replace($common_rep, '', $request->tags);
   

        if (!empty($request->tags)) 
        {
        //    dd($tags);
           $input['tags'] =$tags;  
             
        }
       else {
           $input['tags'] = null;
        }  


        if($request->secheck){
            $input['secheck'] = 1;
            if($request->meta_tag){
                
                $meta_tags = str_replace($common_rep, '', $request->meta_tag);
                $input['meta_tag'] = $meta_tags;
            }
    
            if($request->meta_description){
                $input['meta_description'] = $request->meta_description;
            }
        }else{
            $input['meta_description'] = null;
            $input['meta_tag'] = null;
        }


      
        $input['goal'] = $this->Currency($request->goal);   
        if(Auth::user()->id){
            $input['user_id'] = Auth::user()->id;
            if($data->is_panding == 1){
                $input['is_panding'] = 1;
            }else{
                $input['is_panding'] = 0;
            }
            $input['status'] = 'open';
          }     
       

        if ($request->featured == 1) 
        { 
           $input['featured'] = 1;       
        }else{
            $input['featured'] = 0; 
        }

        if ($request->send_newsletter== 1) 
        {
           $input['send_newsletter'] = 1;
                 
        }else{
            $input['send_newsletter'] = 0;
        }
       
            if ($file = $request->file('photo')) 
            {     
                if($data->photo != null)
                {
                    if (file_exists('assets/images/campaign/'.$data->photo)) {
                        unlink('assets/images/campaign/'.$data->photo);
                    }
                }  
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/campaign',$name);
                         
            $input['photo'] = $name;
            } 


         
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = __('Data Updated Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function delete($id)
    {
        $data = Campaign::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section     
            $msg = __('Data Deleted Successfully.');
            return response()->json($msg);      
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path().'assets/images/campaign'.$data->photo)) {
            unlink(public_path().'assets/images/campaign'.$data->photo);
        }

        $donations = $data->donation;
        if( $donations){
            foreach($donations as $donation){
                Notification::where('donation_id',$data->id)->delete();
            }
        }
      
        if($donations){
            foreach($donations as $d){
                $d->delete();
            }
        }

        
        $withdraws =  Withdraw::where('campaign_id',$data->id)->get();
        if($withdraws){
            foreach($withdraws as $withdraw){
                 UserNotification::where('withdraw_id',$withdraw->id)->delete();
             }
        }

        if($withdraws){
            foreach($withdraws as $with){
                Notification::where('withdrow_id',$with->id)->delete();
            }
        }
       
    
        if($withdraws){
            foreach($withdraws as $w){
                $w->delete();
            }
        }
        $data->delete();
        //--- Redirect Section     
      
        return back()->with('success',__('Data Deleted Successfully'));      
        //--- Redirect Section Ends     
    }


    public function View($id)
    {
        $data = Campaign::findOrFail($id);
        return view('user.campaign.view',compact('data'));
    }

  
    public function GetCampaignFund($id)
    {
       $currencies = Currency::where('is_default',1)->first();
       $data =  round(Campaign::findOrFail($id)->available_fund,2);
        return __('This Campaign Available Fund').' = ' . $currencies->sign  .' '. round($data * $currencies->value , 2 );
    }


    private function Currency($value)
    {
        $currency = Currency::where('is_default',1)->first();
        $amount =  ($value / $currency->value);
        return round($amount,2);
    }

}