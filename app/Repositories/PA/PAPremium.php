<?php
namespace App\Repositories\PA;
use DateTime;

use App\PAPrice;

use Carbon\Carbon;

class Premium implements IPremium{
    public function PACalculate($risk)
    {
        # code...        
        // $period = Period::find($risk->period_id);
        // $plan = Plan::find($risk->plan_id);
        $price = PAPrice::where([['period_id','=',$risk->period_id],['plan_id','=', $risk->plan_id]])->first();
        $member_qty = Member::where('policy_id','=',$risk->policy_id)->get()->count();
        if ($member_qty==0) {
            # code...
            $member_qty = 1;
        }
        if (!$price) {
            # code...
            $price->amount = 250000;
        }
        return $price->amount*$member_qty;
    }
    
}
