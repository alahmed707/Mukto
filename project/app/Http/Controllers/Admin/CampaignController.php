<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Category;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Withdraw;
use App\Models\Notification;
use App\Models\Generalsetting;
use App\Models\Currency;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use App;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->language = DB::table('admin_languages')->where('is_default','=',1)->first();
        App::setlocale($this->language->name);
    }

    
    //*** JSON Request
    public function datatables()
    {
         $data = Campaign::orderBy('id','desc')->where('is_panding',1)->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($data)
                ->editColumn('photo', function(Campaign $data) {
                    $photo = $data->photo ? url('assets/images/campaign/'.$data->photo):url('assets/images/noimage.png');
                    return '<img src="' . $photo . '" alt="Image">';
                })
                
                ->addColumn('status', function(Campaign $data) {
                    $class = $data->status == 'close' ? 'drop-danger' : 'drop-success';
                    $s = $data->status == 'close' ? 'selected' : '';
                    $ns = $data->status == 'open' ? 'selected' : '';
                    return '
                    <div class="action-list">
                        <select class="process select droplinks '.$class.'">
                            <option data-val="0" value="'. route('admin-campaign-status',['id1' => $data->id, 'id2' => 'close']).'" '.$s.'>'.__('Close').'</option>
                            <option data-val="1" value="'. route('admin-campaign-status',['id1' => $data->id, 'id2' => 'open']).'" '.$ns.'>'.__('Open').'</option>
                        </select>
                    </div>';
                })
               
                ->editColumn('category_name', function(Campaign $data) {
                    $category_name = strlen(strip_tags($data->category->name)) > 250 ? substr(strip_tags($data->$data->category->name),0,250).'...' : strip_tags($data->category->name);
                    return  $category_name;
                })
                ->editColumn('available_fund', function(Campaign $data) {
                    $available_fund = strlen(strip_tags($data->available_fund)) > 250 ? substr(strip_tags($data->available_fund),0,250).'...' : strip_tags($data->available_fund);
                    $currency = Currency::where('is_default',1)->first();
                    return  $currency->sign . ' '. round( $available_fund * $currency->value, 2);
                })
                ->editColumn('goal', function(Campaign $data) {
                    $goal = strlen(strip_tags($data->goal)) > 250 ? substr(strip_tags($data->goal),0,250).'...' : strip_tags($data->goal);
                    $currency = Currency::where('is_default',1)->first();
                    return $currency->sign . ' '. round($goal *$currency->value, 2);
                })
                ->editColumn('end_date', function(Campaign $data) {
                    $end_date = strlen(strip_tags($data->end_date)) > 250 ? substr(strip_tags($data->end_date),0,250).'...' : strip_tags($data->end_date);
                    return  $end_date;
                })
                ->addColumn('action', function(Campaign $data) {
                    return '<div class="action-list"><a href="' . route('admin-campaign-edit',$data->id) . '" class="edit" > <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" data-href="' . route('admin-campaign-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a><a href="' . route('admin-campaign-view',$data->id) . '" class="edit"><i class="fas fa-eye"></i> '.__('View').'</a></div>';
                }) 
                ->rawColumns(['photo','status', 'action'])
                ->toJson(); //--- Returning Json Data To Client Side
            }




    public function Pandingdatatables()
    {
        $data = Campaign::orderBy('id','desc')->where('is_panding',0)->get();
        //--- Integrating This Collection Into Datatables
        return DataTables::of($data)
            ->editColumn('photo', function(Campaign $data) {
                $photo = $data->photo ? url('assets/images/campaign/'.$data->photo):url('assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            
            ->addColumn('status', function(Campaign $data) {
                $class = $data->is_panding == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select  StatusChange '.$class.'"><option data-val="1"  value="'. route('admin-campaign-is_panding',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>'.__('Aproved').'</option><option data-val="0" value="'. route('admin-campaign-is_panding',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>'.__('Panding').'</option>/select></div>';
            })
            ->editColumn('campaign_name', function(Campaign $data) {
                $campaign_name = strlen(strip_tags($data->campaign_name)) > 250 ? substr(strip_tags($data->campaign_name),0,250).'...' : strip_tags($data->campaign_name);
                return  $campaign_name;
            })
            ->editColumn('category_name', function(Campaign $data) {
                $category_name = strlen(strip_tags($data->category->name)) > 250 ? substr(strip_tags($data->$data->category->name),0,250).'...' : strip_tags($data->category->name);
                return  $category_name;
            })
            ->editColumn('goal', function(Campaign $data) {
                $goal = strlen(strip_tags($data->goal)) > 250 ? substr(strip_tags($data->goal),0,250).'...' : strip_tags($data->goal);
                $currency = Currency::where('is_default',1)->first();
                return $currency->sign . ' '. round($goal *$currency->value, 2);
            })
            ->editColumn('end_date', function(Campaign $data) {
                $end_date = strlen(strip_tags($data->end_date)) > 250 ? substr(strip_tags($data->end_date),0,250).'...' : strip_tags($data->end_date);
                return  $end_date;
            })
            ->addColumn('action', function(Campaign $data) {
                return '<div class="action-list"><a href="' . route('admin-campaign-edit',$data->id) . '" class="edit" > <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" data-href="' . route('admin-campaign-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a><a href="' . route('admin-campaign-panding-view',$data->id) . '" class="edit"><i class="fas fa-eye-alt"></i>'.__('View').'</a></div>';
            }) 
            ->rawColumns(['photo','status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function Withdrowdatatables()
    {
        $data = Withdraw::orderBy('id','desc')->where('user_id',0)->get();
        
    //--- Integrating This Collection Into Datatables
        return DataTables::of($data)

        ->editColumn('method', function(Withdraw $data) {
            $method = strlen(strip_tags($data->method)) > 250 ? substr(strip_tags($data->method),0,250).'...' : strip_tags($data->method);
            return  $method;
        })
        ->editColumn('acc_email', function(Withdraw $data) {
            $acc_email = strlen(strip_tags($data->acc_email)) > 250 ? substr(strip_tags($data->$acc_email),0,250).'...' : strip_tags($data->acc_email);
            return  $acc_email;
        })
        ->editColumn('amount', function(Withdraw $data) {
            $amount = strlen(strip_tags($data->amount)) > 250 ? substr(strip_tags($data->amount),0,250).'...' : strip_tags($data->amount);
            $currency = Currency::where('is_default',1)->first();
            return $currency->sign . ' '. round($amount *$currency->value, 2);
        })
        ->editColumn('created_at', function(Withdraw $data) {
            $created_at = strlen(strip_tags($data->created_at)) > 250 ? substr(strip_tags($data->created_at),0,250).'...' : strip_tags($data->created_at);
            return  $created_at;
        })
        ->addColumn('status', function(Withdraw $data) {
            $status = strlen(strip_tags($data->status)) > 250 ? substr(strip_tags($data->status),0,250).'...' : strip_tags($data->status);
            return  $status;
        }) 
        ->rawColumns(['status'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


    
    public function Donationdatatables()
    {
        $data = Donation::orderBy('id','desc')->get();
        return DataTables::of($data)

        ->editColumn('campaign_id', function(Donation $data) {
            $campaign = strlen(strip_tags($data->campaign->campaign_name)) > 250 ? substr(strip_tags($data->campaign->campaign_name),0,250).'...' : strip_tags($data->campaign->campaign_name);
            return  $campaign;
        })


        ->editColumn('name', function(Donation $data) {
            $name = strlen(strip_tags($data->fname)) > 250 ? substr(strip_tags($data->fname),0,250).'...' : strip_tags($data->fname);
            return  $name .' ' . $data->lname;
        })

        ->editColumn('donation_amount', function(Donation $data) {
            $donation_amount = strlen(strip_tags($data->donation_amount)) > 250 ? substr(strip_tags($data->$donation_amount),0,250).'...' : strip_tags($data->donation_amount);
           $currency = Currency::where('is_default',1)->first();
            return $currency->sign . ' '. round($donation_amount *$currency->value, 2);
        })


        ->editColumn('created_at', function(Donation $data) {
            
            return  $data->created_at->diffForHumans();
        })

        ->editColumn('payment_status', function(Donation $data) {
            $status = $data->payment_status == 'Completed'  ? 'badge badge-success p-2' : 'badge badge-success p-2';
            return  "<span class='".$status."'>".$data->payment_status."</span>" ;
        })

        ->addColumn('action', function(Donation $data) {
            
            return '<div class="action-list"><a data-href="' .  route('admin-donation-view',$data->id) . '" class="view" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>'. __('View') .'</a></div>';
        }) 
        
        ->rawColumns(['payment_status','action'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


    public function DonationdatatablesSingle($id)
    {
 
        $data = Donation::where('campaign_id',$id)->get();
        
    //--- Integrating This Collection Into Datatables
        return DataTables::of($data)

        ->editColumn('name', function(Donation $data) {
            $name = strlen(strip_tags($data->fname)) > 250 ? substr(strip_tags($data->fname),0,250).'...' : strip_tags($data->fname);
            return  $name .' ' . $data->lname;
        })

        ->editColumn('donation_amount', function(Donation $data) {
            $donation_amount = strlen(strip_tags($data->donation_amount)) > 250 ? substr(strip_tags($data->$donation_amount),0,250).'...' : strip_tags($data->donation_amount);
           $currency = Currency::where('is_default',1)->first();
            return $currency->sign . ' '. round($donation_amount *$currency->value, 2);
        })
        
       
        ->toJson(); //--- Returning Json Data To Client Side
    }



    public function AllDonation()
    {
       return view('admin.campaign.donation');
    }
    

    //*** GET Request
    public function index()
    {
        return view('admin.campaign.index');
    }

    //*** GET Request
    public function create()
    {
        $category = Category::all();
        return view('admin.campaign.create',compact('category'));
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

     $validator = Validator::make($request->all(), $rules,$customs);
    
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }



     //--- Validation Section Ends
     $input = $request->all();
        //--- Logic Section
        $input['status'] = 'open';
        $input['is_panding'] = 1;

        $input['goal'] = $this->currency($request->goal);

        if (!empty($request->preloaded_amount)) 
        { 
            $prelod = array();
            foreach ($request->preloaded_amount as $key => $value) {
                $prelod[$key] = $this->currency($value);
            }
           $input['preloaded_amount'] = implode(',',$prelod );   
               
        }
       else {
           $input['preloaded_amount'] = null;
        } 

        if (!empty($request->tags)) 
        {
           $input['tags'] = implode(',', $request->tags);       
        }else{
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
                $input['secheck'] =1;
                if($request->meta_tag){
                    $input['meta_tag'] =implode(',', $request->meta_tag);
                }
        
                if($request->meta_description){
                    $input['meta_description'] = $request->meta_description;
                }
            }else{
                $input['meta_description'] = null;
                $input['meta_tag'] = null;
            }
        
         
     
        $data = new Campaign();
       
        $data->create($input)->save();

        //--- Logic Section Ends
        //--- Redirect Section        
        $msg = __('New Data Added Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {   $category = Category::all();
        $data = Campaign::findOrFail($id);
        return view('admin.campaign.edit',compact('data','category'));
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
        $input['status'] = 'open';
        $input['is_panding'] = 1;
        $input['goal'] = $this->currency($request->goal);
        
        if (!empty($request->preloaded_amount)) 
        {
            $prelod = array();
            foreach ($request->preloaded_amount as $key => $value) {
                $prelod[$key] = $this->currency($value);
            }
           $input['preloaded_amount'] = implode(',',$prelod );  
             
        }
       else {
           $input['preloaded_amount'] = null;
        } 
        if (!empty($request->tags)) 
        {
           $input['tags'] = implode(',', $request->tags);       
        }else{
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

           
            if($request->secheck){
                $input['secheck'] = 1;
                if($request->meta_tag){
                    $input['meta_tag'] =implode(',', $request->meta_tag);
                }
        
                if($request->meta_description){
                    $input['meta_description'] = $request->meta_description;
                }
            }else{
                $input['meta_description'] = null;
                $input['meta_tag'] = null;
            }




        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = __('Data Updated Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
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
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }


    public function status($id1,$id2)
    {
        $data = Campaign::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }


    public function isPanding($id1,$id2)
    {
        $data = Campaign::findOrFail($id1);
        $data->is_panding = $id2;
        $data->update();

        $notf = new UserNotification;
        $notf->user_id = $data->user_id;
        $notf->campaign_id = $data->id;
        $notf->type = "campaign";
        $notf->save();
                    

        $msg = __('Status Update Successfully.');
        return response()->json($msg); 
    }

    public function campaignView($id)
    {  
        $data = Campaign::findOrFail($id);
        return view('admin.campaign.view',compact('data'));
    }

    public function PandingView ($id)
    { 
        $data = Campaign::findOrFail($id);
        return view('admin.campaign.panding_view',compact('data'));
    }

    public function Pandingindex()
    {
        return view('admin.campaign.panding');
    }

    public function CampaignWithdrow(Request $request)
    {

            $from = Campaign::findOrFail($request->campaign_id);
            $withdrawcharge = Generalsetting::findOrFail(1);
            $charge = $withdrawcharge->withdraw_fee;
            if($request->amount > 0){
                $amount = $this->Currency($request->amount);
                if ($from->available_fund >= $amount){
                    $fee = (($withdrawcharge->withdraw_charge / 100) * $amount) + $charge;
                    $finalamount = $amount - $fee;
                    if ($from->available_fund >= $finalamount){
                    $finalamount = number_format((float)$finalamount,2,'.','');
    
                    $from->available_fund = $from->available_fund - $amount;
                    $from->update();
    
                    $newwithdraw = new Withdraw();
                    $newwithdraw['user_id'] = 0;
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
                    $newwithdraw['status'] = 'completed';
                    $newwithdraw->save();
                    return response()->json(__('Withdraw Process Successfully.')); 
                }else{
                    return response()->json(array('errors' => [ 0 => __('Insufficient Balance.') ])); 
                }
                }else{
                    return response()->json(array('errors' => [ 0 => __('Insufficient Balance.') ])); 
                }
            }
                return response()->json(array('errors' => [ 0 => __('Please enter a valid amount.') ])); 
    }


    public function CampaignWithdrowCreate($id)
    {
        $data = Campaign::findOrFail($id);
        return view('admin.campaign.campaign_withdrow',compact('data'));
    }

    public function GetCampaignFund($id)
    {
       $currencies = Currency::where('is_default',1)->first();
       $data =  round(Campaign::findOrFail($id)->available_fund,2);
        return __("This Campaign's Available Fund").' = ' . $currencies->sign  .' '. round($data * $currencies->value , 2 );
    }


    private function Currency($value)
    {
        $currency = Currency::where('is_default',1)->first();
        $amount =  $value / $currency->value;
        return round($amount,2);
    }



    public function DonationView($id)
    {
       $data = Donation::findOrFail($id);

       return view('admin.campaign.donation_view',compact('data'));
    }

}