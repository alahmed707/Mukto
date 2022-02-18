<?php

namespace App\Http\Controllers\Admin;


use App\Models\Pagesetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use App;


class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->language = DB::table('admin_languages')->where('is_default','=',1)->first();
        App::setlocale($this->language->name);
    }


    //*** GET Request
    public function Index()
    {
        $data = Pagesetting::findOrFail(1);
        return view('admin.homepage.index',compact('data'));

    }

    //*** POST Request
    public function Update(Request $request)
    {
      $photo =  null;
        //--- Validation Section
        $rules = [
               'homepage_photo'      => 'mimes:jpeg,jpg,png,svg',
               'homepage_title'      => 'required',
               'homepage_subtitle'      => 'required',
               'homepage_description'      => 'required',

                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();
            if ($file = $request->file('homepage_photo'))
            {

                if($data->homepage_photo != null)
                {

                    if (file_exists('assets/images/home-background/'.$data->homepage_photo)) {
                        unlink('assets/images/home-background/'.$data->homepage_photo);
                    }
                }
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/home-background',$name);

            $photo = $name;
            }


            Pagesetting::where('id',1)->update([
            'homepage_title' => $request->homepage_title,
            'homepage_subtitle' => $request->homepage_subtitle,
            'homepage_description' => $request->homepage_description,
            'homepage_link1' => $request->homepage_link1,
            'homepage_link2' => $request->homepage_link2,
            'homepage_photo' => $photo,
            'homepage_button1'=>$request->homepage_button1,
            'homepage_button2'=>$request->homepage_button2,

        ]);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Slider::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section
            $msg = __('Data Deleted Successfully.');
            return response()->json($msg);
            //--- Redirect Section Ends
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/sliders/'.$data->photo)) {
            unlink(public_path().'/assets/images/sliders/'.$data->photo);
        }
        $data->delete();
        //--- Redirect Section
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
