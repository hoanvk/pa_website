<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Link;
use App\Jumbotron;
use App\SelectList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
class B2CPageController extends Controller
{
    // public $customer;
    // public $jumbotron;
    // public $links;
    // public $languages;
    //
    public function __construct(Request $request)
    {
        if (Session::has('customer')){
            // do some thing if the key is exist
            $customer = Session::get('customer');
          }else{
            //the key is not exist in the session
            $customer = Customer::create(['status'=>'P']);
            Session::put('customer', $customer);
          }
          $action = 'TVL';
          if ($request->is('online/pa*') || $request->is('agent/pa*')) {
            //
            $action ='PA';
          }
          elseif ($request->is('online/motor*') || $request->is('agent/motor*')) {
            # code...
            $action ='MTT';
          }
          $jumbotron = Jumbotron::where('name','=',$action)->first();
          
          $languages = SelectList::languages();
          $links = Link::all();
          foreach ($links as $link) {
            # code...
            if ($link->name == $action) {
              # code...
              $link->active = 'active';
            }
          }

          View::share(['customer'=> $customer,'jumbotron'=>$jumbotron,
            'languages'=> $languages, 'links'=> $links]);
          
    }
}
