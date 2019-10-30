<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PARisk extends Model
{
    //
    protected $table = 'pa_risks';
    protected $fillable = ['id','period_id','plan_id','premium'];
    public static function coverage($start_date, $period_id)
    {
        # code...
        $start_date=DateUtil::parseDate($start_date);
        $period = Period::find($period_id);
        $end_date = $start_date;
        if (!$start_date) {
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
