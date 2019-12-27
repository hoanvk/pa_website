<?php

namespace App\Http\Controllers\PA;

use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Common\IPaymentRepo;

class CheckoutController extends B2CPageController
{
    //
    public function index($policy_id, IPaymentRepo $repository)
    {
        # code...
        $status = $repository->checkPolicyStatus($policy_id);

        /**
         * check policy status pending payment
         */
        if ($status) {
            return redirect()->route('pa.confirm',['policy_id'=>$policy_id ])->with('error','Fill all policy information be for checkout');
        }
        $invoice = $repository->getVATInvoice($policy_id);
        return view('checkout.invoice')->with(['invoice'=>$invoice]);
    }
    public function store(InvoiceRequest $request, $policy_id, IPaymentRepo $repository)
    {
        //
        $pay_method = Input::get('pay_method');
        $inv_name = Input::get('inv_name');
        $inv_taxcode = Input::get('inv_taxcode');
        $inv_address = Input::get('inv_address');
         
        $invoice = $repository->updateVATInvoice($policy_id,$inv_name, $inv_address, $inv_taxcode, $pay_method);
        $paymentUrl = $repository->buildOnePayGateway($policy_id);
        //dd($paymentUrl);
        
        return Redirect::to($paymentUrl);        
    }
    public function confirm($payment_id, Request $request, IPaymentRepo $repository)
    {
        # code...
        
        $payment_log=$repository->updateOnePayGateway($payment_id, $request);
        $tranStatus = $payment_log->tran_status;
        $msgType = 'error';
        if ($tranStatus=='0') {
            # code...
            $msgType = 'success';
        }
        $message = $repository->getOnePayError($tranStatus);

        //Add session back to check useronline    
        session(['policy_id' => $payment_log->policy_id]);
        return redirect()->route('pa.confirm',['policy_id'=>$payment_log->policy_id ])->with($msgType,$message);
    }
}
