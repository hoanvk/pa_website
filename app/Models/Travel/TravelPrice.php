<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_travel_prices';
    protected $fillable = ['id', 'agent_id','plan_id', 'destination_id', 'day_range_id', 'amount'];
    public function plan()
    {
        # code...
        return $this->belongsTo(Plan::class);
    }
    public function agent()
    {
        # code...
        return $this->belongsTo(Agent::class);
    }
    public function destination()
    {
        # code...
        return $this->belongsTo(Destination::class);
    }
    public function day_range()
    {
        # code...
        return $this->belongsTo(DayRange::class);
    }
}
