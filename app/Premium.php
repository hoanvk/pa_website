<?php
namespace App;
use Carbon\Carbon;
use DateTime;
use App\Price;
use App\Policy;
use App\DayRange;

class Premium{
    public static function calculate(Policy $policy)
    {
        
        // $policy = Policy::find($policy_id);
        $agent_id = $policy->agent_id;
        $start_date = Carbon::parse($policy->start_date);
        $end_date = Carbon::parse($policy->end_date);
        $risk = $policy->risks->first();
        $plan_id = $risk->plan_id;
        $destination_id = $risk->destination_id;
        $adult_qty = $risk->adult_qty;
        $dependent_qty = $risk->dependent_qty;
        $policy_type = $risk->policy_type;
        $insured_qty = 1;
if ($policy_type == 'F')
{
    $insured_qty =2;
}
else
{
    $insured_qty = $adult_qty + $dependent_qty;
}
// $interval = $end_date->diff($start_date);
// $days = $interval->format('%a');
$days = $end_date->diffInDays($start_date);
        // $risk = $policy->risks->first();
        // $product_id = $risk->product_id; 
        // $destination_id = $risk->destination_id;
        $day_range_id = DayRange::where([['day_from','<=',$days],['day_to','>=',$days]])->first()->id; 
        // echo $days;
        // $day_range_id = 1;
        $premium = Price::where([['agent_id','=',$agent_id],
             ['plan_id','=',$plan_id],
             ['destination_id','=',$destination_id],
             ['day_range_id','=',$day_range_id]])->get()->first()->amount;
     return $premium*$insured_qty;
    }  
    public static function withdrawl($agent_id, $premium)
    {
        # code...
        $cash = Cash::where('agent_id','=',$agent_id)->first();
        $os_bal = $cash->os_bal -$premium;
        if ($os_bal<0) {
            # code...
            return false;
        }
        else{
            $cash->update(['os_bal'=>$os_bal]); 
            return true;
        }
        
    }
}
