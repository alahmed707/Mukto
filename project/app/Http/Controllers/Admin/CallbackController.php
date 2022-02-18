<?php

namespace App\Http\Controllers\Admin;
use DataTables;
use App\Http\Controllers\Controller;
use App\Models\CallbackMessage;
use App\Models\Pagesetting;
use DB;
use App;


class CallbackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->language = DB::table('admin_languages')->where('is_default','=',1)->first();
        App::setlocale($this->language->name);
    }


   public function index()
   {
       return view('admin.callback.index');
   }

   public function datatables()
   {
        $datas = CallbackMessage::orderBy('id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return DataTables::of($datas)
                         
                ->editColumn('name', function(CallbackMessage $data) {
                    $name = strlen(strip_tags($data->name)) > 150 ? substr(strip_tags($data->name),0,150).'...' : strip_tags($data->name);
                    return  $name;
                })
                ->editColumn('phone', function(CallbackMessage $data) {
                    $phone = strlen(strip_tags($data->phone)) > 250 ? substr(strip_tags($data->phone),0,250).'...' : strip_tags($data->phone);
                    return  $phone;
                })

                ->editColumn('email', function(CallbackMessage $data) {
                    $email = strlen(strip_tags($data->email)) > 250 ? substr(strip_tags($data->email),0,250).'...' : strip_tags($data->email);
                    return  $email;
                })

                ->editColumn('message', function(CallbackMessage $data) {
                    $message = strlen(strip_tags($data->message)) > 250 ? substr(strip_tags($data->message),0,250).'...' : strip_tags($data->message);
                    return  $message;
                })
                ->addColumn('action', function(CallbackMessage $data) {
                    return '<div class="action-list"><a data-href="' . route('admin-callback-show',$data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>Details</a><a href="javascript:;" data-href="' . route('admin-callback-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Delete</a></div>';
                }) 
                ->rawColumns(['photo', 'action'])
                ->toJson(); //--- Returning Json Data To Client Side
   }


   public function Delete($id)
   {
        CallbackMessage::findOrfail($id)->delete();
        $mgs = __('Data Delete Successfully!');
        return $mgs;
   }


   public function show($id)
   {
    $data = CallbackMessage::findOrfail($id);   
    return view('admin.callback.show',compact('data'));
   }


   public function Information()
   {
        $data = Pagesetting::find(1);   
       return view('admin.pagesetting.callback_information',compact('data'));
   }

}
