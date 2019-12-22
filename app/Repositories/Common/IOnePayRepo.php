<?php
namespace App\Repositories\Common;


interface IOnePayRepo{
  public function buildInterGw($payment_log,$items);
  public function updateInterGw($payment_log, $vpc_response);
  public function buildLocalGw($policy_header,$items);
  public function updateLocalGw($payment_log, $vpc_response);
  
  
}