<?php

namespace App;

use App\Period;
use App\DateUtil;
use Illuminate\Database\Eloquent\Model;

class PARisk extends Model
{
    //
    protected $table = 'pa_risks';
    protected $fillable = ['id','policy_id','period_id','plan_id','premium'];
    public function plan()
        {
            # code...
            return $this->belongsTo('App\Plan');
        }
        public function period()
        {
            # code...
            return $this->belongsTo('App\Period');
        }
    public static function coverage($start_date, $period_id)
    {
        # code...
        
        $period = Period::find($period_id);
        $end_date = $start_date;
        if ($start_date) {
            # code...
            
            if ($period->unit=='MM') {
                # code...
                $end_date = $start_date->addMonths($period->qty);
            } elseif ($period->unit=='YY') {
                # code...
                $end_date = $start_date->addYears($period->qty);
            } elseif ($period->unit=='DD') {
                # code...
                $end_date = $start_date->addDays($period->qty);
            }
            
            
        }
        return $end_date;
    }
}
