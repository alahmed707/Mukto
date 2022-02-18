<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    protected $fillable = ['contact_success', 'cservice','ccounter','cfeature','cdonate','ccallback','cteam','cportfolio', 'cnews' ,'contact_email','callback_title','counter_image','callback_subtitle','callback_image1','callback_image2','counter_subtitle','donate_title','donate_subtitle','donate_button_text','counter_title','counter_video_link','contact_title','contact_text','street','phone','fax','email','site','side_title','side_text','slider','service','featured','small_banner','best','top_rated','large_banner','big','hot_sale','review_blog','pricing_plan','video_title','video_text','video_link','video_image','video_background','service_subtitle','service_title','service_text','portfolio_subtitle','portfolio_title','portfolio_text','p_subtitle','p_title','p_text','p_background','team_subtitle','team_title','team_text','review_subtitle','review_title','review_text','review_background','blog_subtitle','blog_title','blog_text','c_title','c_text','c_background','contact_section','contact_meta_key','contact_meta_description','faq_photo','team_meta_key','team_meta_description','project_meta_key','project_meta_description','service_meta_key','service_meta_description', 'time', 'day', 'service_left_img', 'day_icon', 'phone_icon', 'street_icon','homepage_button1','homepage_button2','donate_link1'];

    public $timestamps = false;

    public function upload($name,$file,$oldname)
    {
                $file->move('assets/images',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$oldname)) {
                        unlink(public_path().'/assets/images/'.$oldname);
                    }
                }
    }

}
