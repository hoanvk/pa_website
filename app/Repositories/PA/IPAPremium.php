<?php
 namespace App\Repositories\PA;
 
 interface IPAPremium {

  /**
   * Header and Risk
   */
  public function coverage($start_date, $period_id);
  public function premiumCalculate($risk);
  public function policyNumber($product_id);
  public function checkPolicy($policy_id, $start_date, $product_id, $period_id, $plan_id, $promo_code);
  public function createPolicy($policy_id, $start_date, $end_date, $product_id, $period_id, $plan_id, $promo_code);
  
  public function getPolicyHeader($policy_id);
  public function getPolicyRisks($policy_id);

  /**
   * Policy Holder
   */
  public function checkPolicyHolder($name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email);
  public function createPolicyHolder($policy_id,$name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email);
  public function getPolicyHolder($policy_id);

  /**
   * Insured Person
   */
  public function getInsuredList($policy_id);
  public function getInsuredPerson($member_id);
  public function initInsuredPerson($policy_id);
  public function getSelfInsured($policy_id);
  public function checkInsuredPerson($policy_id,$member_id, $ownship,$insured_name,$insured_id,$dob,$gender,$naty);
  public function checkRemoveInsured($member_id);
  public function createInsuredPerson($policy_id,$member_id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
 }