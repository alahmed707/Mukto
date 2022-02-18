<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['campaign_id','fname','lname', 'email', 'address','number','note','donation_amount'];

    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign');
    }
}
