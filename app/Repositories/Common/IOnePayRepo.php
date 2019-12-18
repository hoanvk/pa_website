<?php
namespace App\Repositories\Common;

use Illuminate\Http\Request;

interface IOnePayRepo{
  public function buildInterGw($policy_header,$items);
  public function updateInterGw($vpc_response);
  public function buildLocalGw($policy_header,$items);
  public function updateLocalGw($vpc_response);
  
  
}