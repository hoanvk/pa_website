<?php
namespace App\Repositories\Common;
interface IPaymentRepo{
  public function buildOnePayGateway($policy_id);
}