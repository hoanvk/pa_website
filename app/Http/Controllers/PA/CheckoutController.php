<?php

namespace App\Http\Controllers\PA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Common\IPaymentRepo;

class CheckoutController extends B2CPageController
{
    //
    public function index($policy_id, IPaymentRepo $repository)
    {
        # code...
        $paymentUrl = $repository->buildOnePayGateway($policy_id);
        // dd($paymentUrl);
        
        return Redirect::to($paymentUrl);
    }
    public function confirm($policy_id, Request $request, IPaymentRepo $repository)
    {
        # code...
        
        $tranStatus=$repository->updateOnePayGateway($policy_id, $request);
        
        $msgType = 'error';
        if ($tranStatus=='0') {
            # code...
            $msgType = 'success';
        }
        $message = $repository->getOnePayError($tranStatus);
        
        return redirect()->route('pa.confirm',['policy_id'=>$policy_id ])->with($msgType,$message);
    }
}
