<?php

namespace App\Repositories\PA;
use App\Models\PA\PARisk;
use App\Models\PA\PAPrice;
use App\Models\PA\PASeqNo;
use App\Models\Master\Agent;
use App\Models\Common\Member;
use App\Models\Master\Period;
use App\Models\Master\Product;
use App\Models\Common\Customer;
use App\Models\Master\AutoNumber;
use App\Models\Common\PolicyHeader;
use App\Repositories\Common\IDateUtil;

class PAPremium implements IPAPremium{
    private $dateUtil;
    public function __construct(IDateUtil $dateUtil) 
    {
        $this->dateUtil = $dateUtil;
    } 
  public function coverage($start_date, $period_id)
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
  public function premiumCalculate($risk)
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
    public function getPolicyHeader($product_id){

    }
    public function getPolicyRisks($product_id){

    }
    public function policyNumber($product_id)
    {
        # code...
        $autonumber = AutoNumber::where('product_id',$product_id)->get()->first();
        $last_number = $autonumber->last_number + 1;
        $autonumber->update(['last_number'=>$last_number]);
        return $last_number;
    }
    public function checkPolicy($start_date, $product_id, $period_id, $plan_id, $promo_code){
        return 0; //Success
    }
    public function createPolicy($start_date, $product_id, $period_id, $plan_id, $promo_code){
        $quotation_no =PASeqNo::quotation_no();               
        $end_date = $this->coverage($start_date, $period_id);
        $period = Period::find($period_id);

        //Get default Agent for online customer
        $product = Product::find($product_id);
        $agent = Agent::find($product->agent_id);
        
        $policy = PolicyHeader::create(['quotation_no'=> $quotation_no,
        'policy_no'=>'',
        'product_id'=>$product_id,        
        
        'start_date'=>$start_date,
        'end_date'=>$end_date,
        'agent_id'=>$agent->id,
        'premium'=>0,        
        'period'=>$period->qty,
        // 'customer_id'=>0,
        'status'=>2,        
        ]);

        $risk = PARisk::create(['policy_id'=> $policy->id,                 
        'premium'=>0,                
        'plan_id' => $plan_id,
        'period_id' => $period_id,
        'promo_code' =>$promo_code]);  
        
        
        $premium = $this->premiumCalculate($risk); 
        $policy->update(['premium'=>$premium]);
        $risk->update(['premium'=>$premium]);  
        return $policy;
    }
  public function updatePolicy($policy_id, $start_date, $product_id, $period_id, $plan_id, $promo_code){

  }
  public function checkPolicyHolder($name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email){
      return 0;
  }
  public function createPolicyHolder($policy_id,$name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email){
    $customer = Customer::where('policy_id', '=', $policy_id)->first();
    if ($customer=== null) {
        
        $customer = Customer::create(['name' => $name,
            'tgram'=>$tgram,
            'dob'=>$dob,
            'natlty'=>$natlty,
            'gender'=>$gender,
            'city'=>$city,
            'policy_id'=>$policy_id,
            'mobile'=>$mobile,
            'address'=>$address,
            'email'=>$email,
            'status'=>'1'
        ]);        
     }
     else{
        $customer->update(['name' => $name,
            'tgram'=>$tgram,
            'dob'=>$dob,
            'natlty'=>$natlty,
            'gender'=>$gender,
            'city'=>$city,
            'policy_id'=>$policy_id,
            'mobile'=>$mobile,
            'address'=>$address,
            'email'=>$email
            ]
        );
     }
        
        $policy = PolicyHeader::find($policy_id);

        if ($policy->status < 3) {
            # code...
            $policy->update(['status'=>3]);
        }
        $policy->update(['customer_id'=>$customer->id]);
        return $customer;
  }
  public function getPolicyHolder($policy_id){
    $customer =Customer::where('policy_id', '=', $policy_id)->first();
    if ($customer) {
        $customer->dob = date('d/m/Y', strtotime($customer->dob));
    }
    
    return $customer;
  }
  public function getInsuredList($policy_id){
    return Member::where('policy_id','=',$policy_id)->get();  
  }
  public function getInsuredPerson($member_id){
      $member= Member::find($member_id);
      $member->dob = date('d/m/Y', strtotime($member->dob));
      return $member;
  }
  public function initInsuredPerson(){
    $member = new Member();
    $member->naty = 'VN';
    return $member;
  }
  public function checkInsuredPerson($policy_id,$member_id, $ownship,$insured_name,$insured_id,$dob,$gender,$naty){
    $member =Member::where('policy_id', '=', $policy_id)
        ->where('insured_id', '=', $insured_id)
        ->where('id', '!=', $member_id)
        ->first();
        if ($member) {
            return -1001;
        }
    return 0;    
  }

  public function createInsuredPerson($policy_id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty){
    $age    = $dateUtil->age($dob);
    $member = Member::create(['insured_name' => $insured_name,
        'insured_id'=>$insured_id,
        'dob'=>$dob,
        'naty'=>$naty,
        'gender'=>$gender,
        'ownship'=>$ownship,
        'policy_id'=>$policy_id,
        'age'=>$age
    ]);
    $policy = PolicyHeader::find($policy_id);

    if ($policy->status < 4) {
        # code...
        $policy->update(['status' => 4]);

    }
    $risk = $policy->parisk;
    $premium = $this->premiumCalculate($risk);
    $risk->update(['premium'=>$premium]);
    $policy->update(['premium'=>$premium]);

    return $member;
  }
}