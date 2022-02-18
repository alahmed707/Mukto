<?php

namespace App\Http\Controllers\Admin;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeCounter;
use Validator;
use DB;
use App;


class HomeCounterController extends Controller
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
         $datas = HomeCounter::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                            ->editColumn('photo', function(HomeCounter $data) {
                                $photo = $data->photo ? url('assets/images/counter/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->editColumn('text', function(HomeCounter $data) {
                                $text = strlen(strip_tags($data->text)) > 250 ? substr(strip_tags($data->text),0,250).'...' : strip_tags($data->text);
                                return  $text;
                            })
                            ->editColumn('counter', function(HomeCounter $data) {
                                $counter = strlen(strip_tags($data->counter)) > 250 ? substr(strip_tags($data->counter),0,250).'...' : strip_tags($data->counter);
                                return  $counter;
                            })
                            ->addColumn('action', function(HomeCounter $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-counter-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" data-href="' . route('admin-counter-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['photo','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
    
        return view('admin.counter.index');
    }

    //*** GET Request
    public function create()
    {
        
        return view('admin.counter.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'mimes:jpeg,jpg,png,svg',
            'text'      => 'required',
            'counter'      => 'required',
             ];

     $validator = Validator::make($request->all(), $rules);
     
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }

     //--- Validation Section Ends
     $input = $request->all();
        //--- Logic Section
        if ($file = $request->file('photo')) 
            {     
                $name = time().$file->getClientOriginalName();
               
                $file->move('assets/images/counter',$name);
                         
            $input['photo'] = $name;
            
            } 

        $data = new HomeCounter();
        $data->create($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = __('New Data Added Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = HomeCounter::findOrFail($id);
        return view('admin.counter.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
       
        //--- Validation Section
        $rules = [
            'photo'      => 'mimes:jpeg,jpg,png,svg',
            'text'      => 'required',
            'counter'      => 'required',
             ];

     $validator = Validator::make($request->all(), $rules);
     
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }
     //--- Validation Section Ends

        //--- Logic Section
        
        $input = $request->all();

        $data = HomeCounter::findOrFail($id);
        $input = $request->all();

        $input['photo'] = $data->photo;

            if ($file = $request->file('photo')) 
            {     
                if($data->photo != null)
                {
                    if (file_exists('assets/images/counter/'.$data->photo)) {
                        unlink('assets/images/counter/'.$data->photo);
                    }
                }  
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/counter',$name);
                         
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
    public function destroy($id)
    {
        $data = HomeCounter::findOrFail($id);
        if($data->photo != null)
                {
                    if (file_exists('assets/images/counter/'.$data->photo)) {
                        unlink('assets/images/counter/'.$data->photo);
                    }
                } 
        
        //If Photo Doesn't Exist
        
        $data->delete();
        //--- Redirect Section     
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
