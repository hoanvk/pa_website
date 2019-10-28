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
          elseif ($request->is('online/motor*') || $request->is('agent/motor*')) {
            # code...
            $action ='MTT';
          }
          $this->jumbotron = Jumbotron::where('name','=',$action)->first();
          
          $this->languages = SelectList::languages();
          $this->links = Link::all();
          foreach ($this->links as $link) {
            # code...
            if ($link->name == $action) {
              # code...
              $link->active = 'active';
            }
          }

          View::share(['customer'=> $this->customer,'jumbotron'=>$this->jumbotron,
            'languages'=> $this->languages, 'links'=> $this->links]);
          
    }
}
