<?php
 namespace App\Repositories\PA;
 
 interface IPAPremium {

  /**
   * Header and Risk
   */
  public function coverage($start_date, $period_id);
  public function premiumCalculate($risk);
  public function policyNumber($product_id);
  public function checkPolicy($start_date, $product_id, $period_id, $plan_id, $promo_code);
  public function createPolicy($start_date, $product_id, $period_id, $plan_id, $promo_code);
  public function updatePolicy($policy_id, $start_date, $product_id, $period_id, $plan_id, $promo_code);
  public function getPolicyHeader($product_id);
  public function getPolicyRisks($product_id);

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
  public function initInsuredPerson();
  public function checkInsuredPerson($policy_id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
  public function createInsuredPerson($policy_id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
 }