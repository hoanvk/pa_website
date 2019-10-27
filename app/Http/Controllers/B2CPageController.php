<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\SelectList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
class B2CPageController extends Controller
{
    public $customer;
    public $jumbotron;
    public $links;
    public $languages;
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
          $action = 'TVL';
          if ($request->is('online/pa*') || $request->is('agent/pa*')) {
            //
            $action ='PA';
          }
          
          $this->jumbotron = SelectList::jumbotron($action);
          
          $this->languages = SelectList::languages();
          
          View::share(['customer'=> $this->customer,'jumbotron'=>$this->jumbotron,
            'languages'=> $this->languages]);
          
    }
}
