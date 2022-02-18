<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use DB;
use App;



class PageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->language = DB::table('admin_languages')->where('is_default','=',1)->first();
        App::setlocale($this->language->name);
    }


    protected $rules =
    [
        'video_image' => 'mimes:jpeg,jpg,png,svg',
        'video_background'    => 'mimes:jpeg,jpg,png,svg',
        'p_background'    => 'mimes:jpeg,jpg,png,svg',
        'day_icon'    => 'mimes:jpeg,jpg,png,svg',
        'phone_icon'    => 'mimes:jpeg,jpg,png,svg',
        'street_icon'    => 'mimes:jpeg,jpg,png,svg',
        'service_left_img'    => 'mimes:jpeg,jpg,png,svg',
        'c_background'    => 'mimes:jpeg,jpg,png,svg',
        'faq_photo'=>'mimes:jpeg,jpg,png,svg',

    ];


    // Page Settings All post requests will be done in this method
    public function update(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();

            if ($file = $request->file('video_image'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->video_image);
                $input['video_image'] = $name;
            }
            if ($file = $request->file('video_background'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->video_background);
                $input['video_background'] = $name;
            }
            if ($file = $request->file('p_background'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->p_background);
                $input['p_background'] = $name;
            }
            if ($file = $request->file('service_left_img'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->service_left_img);
                $input['service_left_img'] = $name;
            }
            if ($file = $request->file('day_icon'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->day_icon);
                $input['day_icon'] = $name;
            }
            if ($file = $request->file('phone_icon'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->phone_icon);
                $input['phone_icon'] = $name;
            }
            if ($file = $request->file('street_icon'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->street_icon);
                $input['street_icon'] = $name;
            }
            if ($file = $request->file('street_address'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->c_background);
                $input['street_address'] = $name;
            }

            if ($file = $request->file('callback_image1'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->callback_image1);
                $input['callback_image1'] = $name;
            }

            if ($file = $request->file('callback_image2'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->callback_image2);
                $input['callback_image2'] = $name;
            }

            if ($file = $request->file('counter_image'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->counter_image);
                $input['counter_image'] = $name;
            }
            if ($file = $request->file('faq_photo'))
            {

                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->faq_photo);
                $input['faq_photo'] = $name;
            }


        $data->update($input);

        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
    }


    public function homeupdate(Request $request)
    {
        // dd($request->all());
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();

        if ($request->slider == ""){
            $input['slider'] = 0;
        }
        if ($request->service == ""){
            $input['service'] = 0;
        }

        if ($request->cservice == ""){
            $input['cservice'] = 0;
        }
        if ($request->ccounter == ""){
            $input['ccounter'] = 0;
        }
        if ($request->cfeature == ""){
            $input['cfeature'] = 0;
        }
        if ($request->cdonate == ""){
            $input['cdonate'] = 0;
        }
        if ($request->ccallback == ""){
            $input['ccallback'] = 0;
        }
        if ($request->cteam == ""){
            $input['cteam'] = 0;
        }
        if ($request->cportfolio == ""){
            $input['cportfolio'] = 0;
        }
        if ($request->cnews == ""){
            $input['cnews'] = 0;
        }
        $data->update($input);
        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
    }


    public function contact()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.contact',compact('data'));
    }

    public function video()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.video',compact('data'));
    }



    public function homecontact()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.homecontact',compact('data'));
    }

    public function donate()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.donate',compact('data'));
    }

    public function blog()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.blog',compact('data'));
    }

    public function customize()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.customize',compact('data'));
    }

    //Upadte About Page Section Settings


    //Upadte FAQ Page Section Settings
    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', __('FAQ Status Upated Successfully.'));
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', __('Contact Status Upated Successfully.'));
        return redirect()->back();
    }

    //Upadte Contact Page Section Settings
    public function contactupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        Session::flash('success', __('Contact page content updated successfully.'));
        return redirect()->route('admin-ps-contact');;
    }

}
