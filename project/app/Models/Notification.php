<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{

    protected $fillable = ['is_read'];


    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation');
    }

    public static function countConversation()
    {
        return Notification::where('conversation_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }


    public static function countNotification()
    {
        return Notification::where('conversation_id',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }

    public function donationShow()
    {
      return  $this->belongsTo('App\Models\Donation','donation_id','campaign_id');
    }  

    public function campaignShow()
    {
      return  $this->belongsTo('App\Models\Campaign','campaign_id');
    }   

    public function withdrowShow()
    {
      return  $this->belongsTo('App\Models\Withdraw','withdrow_id');
    }   


    
}
