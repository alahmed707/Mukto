<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Session;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = DB::table('generalsettings')->find(1);

        view()->composer('*',function($settings){
            if (Session::has('language')) 
            {
                if (\Request::is('admin/*')) { 
                    $data = DB::table('admin_languages')->where('is_default','=',1)->first();
                    App::setlocale($data->name);

                }else {
                    $data = DB::table('languages')->find(Session::get('language'));
                    App::setlocale($data->name);                    
                }
            }
                
            else{

                if (\Request::is('admin') || \Request::is('admin/*')) { 
                    $data = DB::table('admin_languages')->where('is_default','=',1)->first();
                    App::setlocale($data->name);
                }else{
                    $data = DB::table('languages')->where('is_default','=',1)->first();
                    App::setlocale($data->name);
                }
                
            }  
            $settings->with('gs', DB::table('generalsettings')->find(1));
            $settings->with('seo', DB::table('seotools')->find(1));
            if(Session::has('currency')){
                $settings->with('currencies', DB::table('currencies')->where('id',Session::get('currency'))->first());
            }else{
                $settings->with('currencies', DB::table('currencies')->where('is_default',1)->first());
            }
            $settings->with('pagesettings', DB::table('pagesettings')->find(1));
            $settings->with('site_lang', $data);
        });
    }
}
