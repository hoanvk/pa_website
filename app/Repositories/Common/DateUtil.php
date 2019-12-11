<?php
namespace App\Repositories\Common;

use DateTime;
use Carbon\Carbon;



class DateUtil implements IDateUtil{
    public function formatDate($date){
        $date = Carbon::create($date);
        return $date->isoFormat('DD/MM/YYYY');
    }
    public function parseDate($date)
    {
        return Carbon::createFromFormat('d-m-Y', str_replace('/', '-', $date));
    }  
    public function compareNow($date)
    {
        # code...        
        return $date->greaterThanOrEqualTo(Carbon::today());
        
    }
    public function compareDate($date1, $date2)
    {
        
        return $date1->greaterThanOrEqualTo($date2);
        
    }
    
    public function age($dob)
    {
        # code...
        return Carbon::now()->diffInYears($dob)+1;
    }
    public function dateDiff($date1, $date2)
    {
        
        # code...
        $days = $date2->diffInDays($date1);

        return $days+1;

    }
    public function addDays($date, $days)
    {        
        # code...
        return $date->addDays($days);
    }
    public function addMonths($date, $months)
    {        
        # code...
        return $date->addMonths($months);
    }
    public function addYears($date, $years)
    {        
        # code...
        return $date->addYears($years);
    }
    
}
