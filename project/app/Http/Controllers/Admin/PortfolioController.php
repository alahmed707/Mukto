<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use App;


class PortfolioController extends Controller
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
         $datas = Portfolio::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                            ->editColumn('photo', function(Portfolio $data) {
                                $photo = $data->photo ? url('assets/images/portfolio/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->addColumn('action', function(Portfolio $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-portfolio-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" data-href="' . route('admin-portfolio-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['photo', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.portfolio.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.portfolio.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        
        //--- Validation Section
        $rules = [
               'photo' => 'required|mimes:jpeg,jpg,png,svg',
            ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Portfolio();
        $input = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/portfolio',$name);           
            $input['photo'] = $name;
        } 
        
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = __('New Data Added Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
       
        //--- Validation Section
        $rules = [
               'photo'  => 'mimes:jpeg,jpg,png,svg',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Portfolio::findOrFail($id);
        $input = $request->all();
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/portfolio',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/portfolio/'.$data->photo)) {
                        unlink(public_path().'/assets/images/portfolio/'.$data->photo);
                    }
                }            
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
        $data = Portfolio::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section     
            $msg = __('Data Deleted Successfully.');
            return response()->json($msg);      
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/portfolio/'.$data->photo)) {
            unlink(public_path().'/assets/images/portfolio/'.$data->photo);
        }
        if (file_exists(public_path().'/assets/images/portfolio/'.$data->photo1)) {
            unlink(public_path().'/assets/images/portfolio/'.$data->photo1);
        }
        $data->delete();
        //--- Redirect Section     
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
