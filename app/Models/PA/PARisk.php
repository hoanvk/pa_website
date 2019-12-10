<?php

namespace App\Models\PA;


use App\Models\Master\Plan;
use App\Models\Master\Period;
use Illuminate\Database\Eloquent\Model;

class PARisk extends Model
{
    //
    protected $table = 'tb_pa_risks';
    protected $fillable = ['id','policy_id','period_id','plan_id','premium'];
    public function plan()
    {
        # code...
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    public function period()
    {
        # code...
        return $this->belongsTo(Period::class, 'period_id');
    }
    
}
