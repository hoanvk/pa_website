<?php

namespace App\Http\Controllers\PA;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index($policy_id)
    {
        # code...
        
        return Redirect::to('http://heera.it');
    }
}
