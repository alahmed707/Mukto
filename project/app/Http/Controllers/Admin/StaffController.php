<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use DataTables;
use Validator;
use DB;
use App;


class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->language = DB::table('admin_languages')->where('is_default','=',1)->first();
        App::setlocale($this->language->name);
    }
    
    public function datatables(){
        $datas = Admin::orderBy('id','desc')->get();
        return datatables::of($datas)
                            ->addColumn('action', function(Admin $data) {
                                $delete = $data->id == 1 ? '':'<a href="javascript:;" data-href="'.route('admin.staff.delete',$data->id).'" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>';
                                return '<div class="action-list">
                                <a data-href="' . route('admin-staff-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>'.__('Edit').'</a>
                                <a data-href="'.route('admin.staff.show',$data->id).'" class="view" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>'.__('Details').'</a>'.$delete.'</div>';
                            })
                            ->rawColumns(['action'])
                            ->toJson();
    }
    public function index(){
        return view('admin.staff.index');
    }

    public function create(){
        return view('admin.staff.create');
    }

    public function Edit($id){
        $data = Admin::findOrFail($id);
        return view('admin.staff.edit',compact('data'));
    }

    public function store(Request $request){
  
        $rules = [
            'name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'email' => 'required|unique:admins,email',
            'phone' => 'required',
            'role' => 'required',
             ];

        $customs = [
            'email.unique' => __('This Email has already Register.')
        ];


        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $data  = new Admin();
        $input = $request->all();

        if($file = $request->file('photo')){
            $name           = time().$file->getClientOriginalName();
            $file           ->move('assets/images/admins/',$name);
            $input['photo'] = $name;
        }

        $input['password']  = bcrypt($request->password);

        $data->fill($input) ->save();

        $msg = __('New Data Added Successfully...!');
        return response()->json($msg);  
    }



    public function Update(Request $request ,$id)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'email' => 'required|unique:admins,email,'.$id,
            'phone' => 'required',
            'role' => 'required',
             ];

        $customs = [
            'email.unique' => __('This Email has already Register.')
        ];


        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $data  = Admin::findOrFail($id);
        $input = $request->all();
        
        if($data->photo){
            if($file = $request->file('photo')){
                if(file_exists(base_path('../assets/images/admins/'.$data->photo))){
                    unlink(base_path('../assets/images/admins/'.$data->photo));
                }
    
                $name           = time().$file->getClientOriginalName();
                $file           ->move('assets/images/admins/',$name);
                $input['photo'] = $name;
            }
        }
        

        $data->update($input);

        $msg = __('Data Updated Successfully.');
        return response()->json($msg); 

    }








    public function show($id){
       $data = Admin::find($id);
       return view('admin.staff.show',compact('data'));
    }

    public function destroy($id){
        Admin::find($id)->delete();
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
    }
}
