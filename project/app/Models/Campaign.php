<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['campaign_name', 'is_panding','secheck','meta_tag','meta_description', 'user_id', 'available_fund', 'category_id','slug', 'photo','location','benefits','description','tags', 'video_link','end_date', 'goal','preloaded_amount','end_after','featured','send_newsletter'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function donation()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}

