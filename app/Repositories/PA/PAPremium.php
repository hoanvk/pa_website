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
use App\Models\Master\Promotion;
use App\Models\Master\AutoNumber;
use App\Models\Common\PolicyHeader;
use App\Repositories\Common\IDateUtil;


class PAPremium implements IPAPremium{
    protected $dateUtil;
    public function __construct(IDateUtil $dateUtil) 
    {
        $this->dateUtil = $dateUtil;
    } 

    /**
     * 1
     * coverage
     */
  public function coverage($start_date, $period_id)
  {
      # code...
      
      $period = Period::find($period_id);
      $end_date = $start_date;
      if ($period->unit=='MM') {
        # code...
        $end_date = $this->dateUtil->addMonths($start_date, $period->qty);
        } elseif ($period->unit=='YY') {
            # code...
            $end_date = $this->dateUtil->addYears($start_date, $period->qty);
        } elseif ($period->unit=='DD') {
            # code...
            $end_date = $this->dateUtil->addDays($start_date, $period->qty);
        }
        
      return $end_date;
  }
  /**
   * 2
   * premiumCalculate
   */
  public function premiumCalculate($risk)
    {
        # code...        
        // $period = Period::find($risk->period_id);
        // $plan = Plan::find($risk->plan_id);
        $price = PAPrice::where([['period_id','=',$risk->period_id],['plan_id','=', $risk->plan_id]])->first();
        $member_qty = Member::where('policy_id','=',$risk->policy_id)->get()->count();
        $promo_code = PolicyHeader::find($risk->policy_id)->promo_code;
        $discount = 0;
        if ($member_qty==0) {
            # code...
            $member_qty = 1;
        }
        if (!$price) {
            //Premium minumum 100K
            $price->amount = 100000;
        }
        if ($promo_code) {
            $product_id = PolicyHeader::find($risk->policy_id)->product_id;
            $promo = Promotion::where('promo_code','=',$promo_code)
                ->where('start_date','<=',date("Y-m-d"))
                ->where('end_date','>=',date("Y-m-d"))
                ->where('product_id','=',$product_id)->first();
            if ($promo) {
                $discount = $promo->discount;
            }
        }
        $premium = $price->amount*$member_qty;

        //Discount maximum 50%
        if ($discount > $premium*0.5) {
            $discount = $premium*0.5;
        }
        return $premium-$discount;
    }

    /**
     * 3
     * getPolicyHeader
     */
    public function getPolicyHeader($policy_id){
        $model = PolicyHeader::find($policy_id);   
        if ($model) {
            $model->start_date = $this->dateUtil->convertDate($model->start_date);
            $model->end_date = $this->dateUtil->convertDate($model->end_date);
        }
        
        return $model;
    }
    /**
     * 4
     * getPolicyRisks
     */
    public function getPolicyRisks($policy_id){

    }
    private function quotation_no()
    {
        # code...  
        $quotation_no = PASeqNo::create();    
        return 'PA-QU-'.$quotation_no->id.'-'.substr(date("Y"),2,2);  
        
    }
    /**
     * 5
     * policyNumber
     */
    public function policyNumber($product_id)
    {
        # code...
        $autonumber = AutoNumber::where('product_id',$product_id)->get()->first();
        $last_number = $autonumber->last_number + 1;
        $autonumber->update(['last_number'=>$last_number]);
        return $last_number;
    }
    /**
     * 6
     * checkPolicy
     */
    public function checkPolicy($policy_id, $start_date, $product_id, $period_id, $plan_id, $promo_code){
        $errors = collect([            
        ]);
        if (!$this->dateUtil->compareNow($start_date)) {
            $errors->put('start_date', ['Start date require greater than today!']);
            
        }
        if ($promo_code) {
            # code...
            if(Promotion::where('promo_code','=',$promo_code)
                ->where('start_date','<=',date("Y-m-d"))
                ->where('end_date','>=',date("Y-m-d"))
                ->where('product_id','=',$product_id)->count() == 0)
            $errors->put('promo_code', ['Promo Code was expired or invalid!']);
        }
        return $errors->all();
    }
    /**
     * 7
     * createPolicy
     */
    public function createPolicy($policy_id, $start_date, $end_date, $product_id, $period_id, $plan_id, $promo_code){
        $quotation_no =$this->quotation_no();               
        
        $period = Period::find($period_id);

        //Get default Agent for online customer
        $product = Product::find($product_id);
        $agent = Agent::find($product->agent_id);
        
        $policy = PolicyHeader::find($policy_id);
        if ($policy) {
            $policy->update([        
                'start_date'=>$start_date,
                'end_date'=>$end_date,              
                'period'=>$period->qty,  
                'product_id'=>$product_id,      
                'promo_code'=>$promo_code, 
                ]);
        
            $risk = $policy->parisk;
            $risk->update(['policy_id'=> $policy->id,                 
            'premium'=>0,                
            'plan_id' => $plan_id,
            'period_id' => $period_id]);  
        }
        else{
            $policy = PolicyHeader::create(['quotation_no'=> $quotation_no,
            'policy_no'=>'',
            'product_id'=>$product_id,        
            
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'agent_id'=>$agent->id,
            'premium'=>0,        
            'period'=>$period->qty,
            'promo_code'=>$promo_code, 
            // 'customer_id'=>0,
            'status'=>2,        
            ]);
    
            $risk = PARisk::create(['policy_id'=> $policy->id,                 
            'premium'=>0,                
            'plan_id' => $plan_id,
            'period_id' => $period_id]);  
        }

        
        $risk = $policy->parisk;
        $premium = $this->premiumCalculate($risk); 
        $policy->update(['premium'=>$premium]);
        $risk->update(['premium'=>$premium]);  
        return $policy;
    }
  
  /**
   * 9
   * checkPolicyHolder
   */
  public function checkPolicyHolder($name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email){
    $errors = collect([                                   
        ]);
    if ($this->dateUtil->compareNow($dob)) {
        $errors->put('dob', ['Date of birth require less than today!']);
        
    }
    return $errors->all();
  }
  /**
   * 10
   * createPolicyHolder
   */
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
  /**
   * 11
   * getPolicyHolder
   */
  public function getPolicyHolder($policy_id){
    $customer =Customer::where('policy_id', '=', $policy_id)->first();
    if ($customer) {
        $customer->dob = $this->dateUtil->convertDate($customer->dob);
    }
    
    return $customer;
  }
  /**
   * 12
   * getInsuredList
   */
  public function getInsuredList($policy_id){
    $members = Member::where('policy_id','=',$policy_id)->get();  
    foreach ($members as $member) {
        $member->dob = $this->dateUtil->convertDate($member->dob);
    }
    return $members;
  }
  /**
   * 13
   * getInsuredPerson
   */
  public function getInsuredPerson($member_id){
      $member= Member::find($member_id);
      $member->dob = $this->dateUtil->convertDate($member->dob);
      return $member;
  }
  /**
   * 14
   * initInsuredPerson
   */
  public function initInsuredPerson($policy_id){
    $member = Member::where('policy_id','=',$policy_id)
        ->where('ownship','=','1')->first();  
    if ($member===null) {
        
        $member = $this->getSelfInsured($policy_id);
    }   
    else{
        $member = new Member();
        $member->ownship = '2';
        $member->policy_id = $policy_id;
        $member->naty = 'VN';
    } 
    
    return $member;
  }
  public function getSelfInsured($policy_id){
    $member = new Member();
    $customer = $this->getPolicyHolder($policy_id);
    $member->ownship = '1';
    $member->policy_id = $policy_id;
    $member->insured_name = $customer->name;
    $member->insured_id = $customer->tgram;
    $member->dob = $customer->dob;
    $member->naty = $customer->natlty;
    $member->gender = $customer->gender;
    return $member;
  }
  /**
   * 15
   * checkInsuredPerson
   */
  public function checkInsuredPerson($policy_id,$member_id, $ownship,$insured_name,$insured_id,$dob,$gender,$naty){
      $errors = collect([                                   
        ]);
    if ($this->dateUtil->compareNow($dob)) {
        $errors->put('dob', ['Date of birth require less than today!']);
        
    }
    $member =Member::where('policy_id', '=', $policy_id)
        ->where('insured_id', '=', $insured_id)
        ->where('id', '!=', $member_id)
        ->first();
        if ($member) {
            $errors->put('insured_id', ['Duplicated insured person identity no!']);
        }
    return $errors->all();    
  }
  /**
   * 
   */
  public function checkRemoveInsured($policy_id){
    $exists = Member::where('policy_id','=',$policy_id)->count();
    $errors = collect([                                   
        ]);
    if (Member::where('policy_id','=',$policy_id)->count()<=1) {
        $errors->put('id', ['Could not delete because the policy need at least 1 insured person!']);
    }        
    
    return $errors->all();   
  }
/**
 * 16
 * createInsuredPerson
 */
  public function createInsuredPerson($policy_id,$member_id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty){
    $age    = $this->dateUtil->age($dob);
    if ($member_id==0) {
        $member = Member::create(['insured_name' => $insured_name,
            'insured_id'=>$insured_id,
            'dob'=>$dob,
            'naty'=>$naty,
            'gender'=>$gender,
            'ownship'=>$ownship,
            'policy_id'=>$policy_id,
            'age'=>$age
        ]);
        
    }
    else{
        $member = Member::find($member_id);
        $member->update(['insured_name' => $insured_name,
            'insured_id'=>$insured_id,
            'dob'=>$dob,
            'naty'=>$naty,
            'gender'=>$gender,
            'ownship'=>$ownship,
            'age'=>$age
        ]);
    }
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
  public function deleteInsuredPerson($member_id){
    $member = Member::find($member_id);
    $policy_id = $member->policy_id;
    $member->delete();

    $policy = PolicyHeader::find($policy_id);
    $risk = $policy->parisk;
    $premium = $this->premiumCalculate($risk);
    $risk->update(['premium'=>$premium]);
    $policy->update(['premium'=>$premium]);
    return $member;
  }
}