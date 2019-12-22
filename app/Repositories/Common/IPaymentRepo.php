<?php
namespace App\Repositories\Common;

use Illuminate\Http\Request;

interface IPaymentRepo{
  public function buildOnePayGateway($policy_id);
  public function updateOnePayGateway($payment_id, Request $request);
  public function getOnePayError($responseCode);
  public function getVATInvoice($policy_id);
  public function updateVATInvoice($policy_id, $inv_name, $inv_address, $inv_taxcode, $pay_method);
  public function checkPolicyStatus($policy_id);
}