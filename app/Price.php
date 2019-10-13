<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $table = 'prices';
    protected $fillable = ['id', 'agent_id','plan_id', 'destination_id', 'day_range_id', 'amount'];
    public function plan()
    {
        # code...
        return $this->belongsTo('App\Plan');
    }
    public function agent()
    {
        # code...
        return $this->belongsTo('App\Agent');
    }
    public function destination()
    {
        # code...
        return $this->belongsTo('App\Destination');
    }
    public function day_range()
    {
        # code...
        return $this->belongsTo('App\DayRange');
    }
}
