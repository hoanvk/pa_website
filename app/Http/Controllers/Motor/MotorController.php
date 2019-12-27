<?php

namespace App\Http\Controllers\Motor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class MotorController extends Controller
{
    //
    public function index($project)
    {
        # code...
        return Redirect::to('https://www.msig.com.vn/insurance/personal-insurance#motor-insurance');    
    }
}
