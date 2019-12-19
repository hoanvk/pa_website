<?php
namespace App\Repositories\Common;


interface IOnePayRepo{
  public function buildInterGw($policy_header,$items);
  public function updateInterGw($policy_header, $vpc_response);
  public function buildLocalGw($policy_header,$items);
  public function updateLocalGw($policy_header, $vpc_response);
  
  
}