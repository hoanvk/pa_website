<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use Illuminate\Support\Facades\View;
class B2CPageController extends Controller
{
    public $customer;
    //
    public function __construct(Request $request)
    {
        if (Session::has('customer')){
            // do some thing if the key is exist
            $this->customer = Session::get('customer');
          }else{
            //the key is not exist in the session
            $this->customer = Customer::create(['status'=>'P']);
            Session::put('customer', $this->customer);
          }
          View::share('customer', $this->customer);
          
    }
}
