<?php
namespace App;

use DateTime;
use Carbon\Carbon;



class DateUtil{
    public static function parseDate($date)
    {
        return Carbon::createFromFormat('d-m-Y', str_replace('/', '-', $date));
    }  
    public static function compareNow($date)
    {
        # code...
        return $date->gt(Carbon::now());
        
    }
    public static function compareDate($date1, $date2)
    {
        # code...
        
        return $date1->gt($date2);
        
    }
    public static function dateDmyDiff($date1, $date2)
    {
        # code...
        $start_date = Carbon::createFromFormat('d-m-Y', str_replace('/', '-', $date1));
        $end_date = Carbon::createFromFormat('d-m-Y', str_replace('/', '-', $date2));
        return dateDiff($start_date, $end_date);
    }
    public static function age($dob)
    {
        # code...
        return Carbon::now()->diffInYears($dob)+1;
    }
    public static function dateDiff($date1, $date2)
    {
        
        # code...
        $days = $date2->diffInDays($date1);

        return $days+1;

    }
}
