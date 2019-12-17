<?php
namespace App\Repositories\Common;

use Illuminate\Http\Request;

interface IPaymentRepo{
  public function buildOnePayGateway($policy_id);
  public function updateOnePayGateway($policy_id, Request $request);
  public function getOnePayError($responseCode);
}