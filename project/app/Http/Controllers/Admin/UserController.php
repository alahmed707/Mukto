<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\Withdraw;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Notification;
use App\Models\AdminUserMessage;
use App\Models\SocialProvider;
use App\Models\AdminUserConversation;
use DataTables;
use Illuminate\Http\Request;
use Validator;
use DB;
use App;

class UserController extends Controller
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
	         $datas = User::orderBy('id')->get();
	         //--- Integrating This Collection Into Datatables
	         return Datatables::of($datas)
	                            ->addColumn('action', function(User $data) {
	                                return '<div class="action-list"><a href="' . route('admin-user-show',$data->id) . '" > <i class="fas fa-eye"></i> '.__('Details').'</a><a data-href="' . route('admin-user-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" class="send" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> '.__('Send').'</a><a href="javascript:;" data-href="' . route('admin-user-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
	                            }) 
	                            ->rawColumns(['action'])
	                            ->toJson(); //--- Returning Json Data To Client Side
	    }

	    //*** GET Request
	    public function index()
	    {
	        return view('admin.user.index');
	    }

	    //*** GET Request
	    public function show($id)
	    {
	        $data = User::findOrFail($id);
	        return view('admin.user.show',compact('data'));
	    }

        //*** GET Request
        public function ban($id1,$id2)
        {
            $user = User::findOrFail($id1);
            $user->ban = $id2;
            $user->update();

        }

	    //*** GET Request    
	    public function edit($id)
	    {
	        $data = User::findOrFail($id);
	        return view('admin.user.edit',compact('data'));
	    }

	    //*** POST Request
	    public function update(Request $request, $id)
	    {
			
	        //--- Validation Section
	        $rules = [
	               'photo' => 'mimes:jpeg,jpg,png,svg',
	                ];

	        $validator = Validator::make($request->all(), $rules);
	        
	        if ($validator->fails()) {
	          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
	        }
	        //--- Validation Section Ends
	        $user = User::findOrFail($id);
			$data = $request->all();
			
		
	        if ($file = $request->file('photo'))
	        {
	            $name = time().$file->getClientOriginalName();
	            $file->move('assets/images/users',$name);
	            if($user->photo != null)
	            {
	                if (file_exists(public_path().'/assets/images/users/'.$user->photo)) {
	                    unlink(public_path().'/assets/images/users/'.$user->photo);
	                }
	            }
	            $data['photo'] = $name;
	        }
	        $user->update($data);
	        $msg = __('Customer Information Updated Successfully.');
	        return response()->json($msg);   
	    }

	    //*** GET Request Delete
		public function destroy($id)
		{
			$user = User::findOrFail($id);
			 //User Campaign Information Delete .......................//

				if($user->campaign->count() > 0){
					foreach($user->campaign as $item){
						if($item->photo){
							if (file_exists(base_path('../assets/images/campaign/'.$item->photo))) {
								unlink(base_path('../assets/images/campaign/'.$item->photo));
							}
							
					}
							$donation = Donation::where('campaign_id',$item->id)->first();
							$withdraw = Withdraw::where('campaign_id',$item->id)->first();

							$notificationa = Notification::where('campaign_id',$item->id)->orwhere('withdrow_id',$withdraw->id)->orwhere('donation_id',$donation->campaign_id)->delete();
							UserNotification::where('campaign_id',$item->id)->delete();
							$donation->delete();
							$withdraw->delete();
							$item->delete();

				}
			}


				//  Admin Table Notification Information Delete ..................//

				$notification = Notification::where('user_id',$user->id)->get();
				if($notification->count() > 0){
					foreach($notification as $item){
						$item->delete();
					}
				}

				//  User Table Notification Information Delete ..................//

				$userNotification = UserNotification::where('user_id', $user->id)->get();
				if($userNotification->count() > 0){
					foreach($userNotification as $i){
					 $i->delete();
					}
				}

				// Withdraw Information Delete.................//

				$withdraw = Withdraw::where('user_id', $user->id)->get();
				if($withdraw->count() > 0){
					foreach ($withdraw as $key => $value) {
						$value->delete();
					}
				}

		    //If Photo Doesn't Exist
		    if($user->photo == null){
		        $user->delete();
			    //--- Redirect Section     
			    $msg = __('Data Deleted Successfully.');
			    return response()->json($msg);      
			    //--- Redirect Section Ends 
		    }else{
				if (file_exists(base_path('../assets/images/users/'.$user->photo))) {
		            unlink(base_path('../assets/images/users/'.$user->photo));
		         }
			}
			//If Photo Exist


			// Message Remove --//
			$adminMessage = AdminUserMessage::where('user_id',$user->id)->get();
			if($adminMessage){
				foreach ($adminMessage as $key => $value) {
					$value->delete();
				}
			}

			$conversatio = AdminUserConversation::where('user_id',$user->id)->get();
			foreach ($conversatio as $key => $value) {
				$value->delete();
			}

			$provider = SocialProvider::where('user_id',$user->id)->first();
			if($provider){
				$provider->delete();
			}

			
		    $user->delete();
		    //--- Redirect Section     
		    $msg = __('User Deleted Successfully.');
		    return response()->json($msg);      
		    //Redirect Section Ends    
		}

	    //*** JSON Request
	    public function withdrawdatatables()
	    {
	         $datas = Withdraw::where('type','=','user')->orderBy('id','desc')->get();
	         //--- Integrating This Collection Into Datatables
			 return Datatables::of($datas)
		
			 					
	                            ->addColumn('email', function(Withdraw $data) {
	                            	$email = $data->user->email;
	                            	return $email;
								}) 
							
	                            ->addColumn('phone', function(Withdraw $data) {
	                            	$phone = $data->user->phone;
	                            	return $phone;
	                            }) 
	                            ->editColumn('status', function(Withdraw $data) {
	                            	$status = ucfirst($data->status);
	                            	return $status;
	                            }) 
	                            ->editColumn('amount', function(Withdraw $data) {
	                            	$sign = Currency::where('is_default','=',1)->first();
	                            	$amount = $sign->sign. ' ' .round($data->amount * $sign->value , 2);
	                            	return $amount;
	                            }) 
	                            ->addColumn('action', function(Withdraw $data) {
	                            	$action = '<div class="action-list"><a data-href="' . route('admin-withdraw-show',$data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i> '.__('Details').'</a>';
	                            	if($data->status == "pending") {
	                            	$action .= '<a data-href="' . route('admin-withdraw-accept',$data->id) . '" data-toggle="modal" data-target="#confirm-delete"> <i class="fas fa-check"></i>'.__('Accept').'</a><a data-href="' . route('admin-withdraw-reject',$data->id) . '" data-toggle="modal" data-target="#confirm-delete1"> <i class="fas fa-trash-alt"></i>'.__('Reject').'</a>';
	                            	}
	                            	$action .= '</div>';
	                                return $action;
	                            }) 
	                            ->rawColumns(['name','action'])
	                            ->toJson(); //--- Returning Json Data To Client Side
	    }

	    //*** GET Request
	    public function withdraws()
	    {
	        return view('admin.user.withdraws');
	    }

	    //*** GET Request	    
	    public function withdrawdetails($id)
	    {
	    	$sign = Currency::where('is_default','=',1)->first();
	        $withdraw = Withdraw::findOrFail($id);
	        return view('admin.user.withdraw-details',compact('withdraw','sign'));
	    }

	    //*** GET Request	
	    public function accept($id)
	    {

	        $withdraw = Withdraw::findOrFail($id);
	        $data['status'] = "completed";
			$withdraw->update($data);
                    $notf = new UserNotification;
                    $notf->user_id = $withdraw->user_id;
                    $notf->withdraw_id = $withdraw->id;
					$notf->type = "Withdraw";
					$notf->save();
					
                    $gs =  Generalsetting::findOrFail(1);

        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $withdraw->acc_email,
            'type' => "Withdraw",
            'cname' => User::findOrFail($withdraw->user_id)->name,
            'oamount' => "",
            'aname' => "",
            'aemail' => "",
            'wtitle' => "",
        ];

        $mailer = new GeniusMailer();
        $mailer->sendAutoMail($data);            
        }
        else
        {
           $to = $withdraw->acc_email;
           $subject = "Your withdraw is completed successfully.";
           $msg = "Hello ".User::findOrFail($withdraw->user_id)->name."!\nYour withdraw is completed successfully.\nThank you.";
           $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);            
		}
		
		    //--- Redirect Section     
		    $msg = __('Withdraw Accepted Successfully.');
		    return response()->json($msg);      
		    //--- Redirect Section Ends   
	    }

	    //*** GET Request	
	    public function reject($id)
	    {
			$withdraw = Withdraw::findOrFail($id);
	        $account = Campaign::findOrFail($withdraw->campaign_id);
	        $account->available_fund = $account->available_fund + $withdraw->amount + $withdraw->fee;
	        $account->update();
	        $data['status'] = "rejected";
	        $withdraw->update($data);
			//--- Redirect Section     
			$notf = new UserNotification;
                    $notf->user_id = $withdraw->user_id;
                    $notf->withdraw_id = $withdraw->id;
                    $notf->type = "Withdraw";
                    $notf->save();


		    $msg = __('Withdraw Rejected Successfully.');
		    return response()->json($msg);      
		    //--- Redirect Section Ends   
		}
		

		private function Currency($value)
			{
				$currency = Currency::where('is_default',1)->first();
				$amount =  $value / $currency->value;
				return round($amount,2);
			}

}