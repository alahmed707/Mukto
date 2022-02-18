<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{

    public static function countNotifications($id)
    {
        return UserNotification::where('user_id','=', $id)->get()->count();
    }


    public function usercampaignShow()
    {
        return  $this->belongsTo('App\Models\Campaign','campaign_id');
    }   

    public function userwithdrowShow()
    {
      return  $this->belongsTo('App\Models\Withdraw','withdraw_id');
    } 


}
