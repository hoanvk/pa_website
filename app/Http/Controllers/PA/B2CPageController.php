<?php

namespace App\Http\Controllers\PA;

use Session;
use App\Models\Master\Product;
use App\Models\Master\Jumbotron;
use App\Models\Master\Link;
use App\Models\PA\PolicyHeader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class B2CPageController extends Controller
{
    // public $customer;
    // public $jumbotron;
    // public $links;
    // public $languages;
    //
    public function __construct(Request $request)
    {
        // if (Session::has('customer')){
        //     // do some thing if the key is exist
        //     $this->customer = Session::get('customer');
        //   }else{
        //     //the key is not exist in the session
        //     $this->customer = Customer::create(['status'=>'P']);
        //     Session::put('customer', $this->customer);
        //   }
        
        
          // $action = 'TVL';
          // if ($request->is('online/pa*') || $request->is('agent/pa*')) {
          //   //
          //   $action ='PA';
          // }
          // elseif ($request->is('online/motor*') || $request->is('agent/motor*')) {
          //   # code...
          //   $action ='MTT';
          // }
          
          $array = collect([            
                       
          ]);
        $product_id = $request->route('product_id');
        $policy = new PolicyHeader();
        $policy_id = $request->route('policy_id');
        
        if ($policy_id) {
          //           
          $policy = PolicyHeader::find($policy_id);
          $array->put('policy', $policy);
          
          if (!$product_id) {
            # code...
            $product_id = $policy->product_id;
          }

        }
        $action = 'TVL';
        
        if ($product_id) {
          //           
          $product = Product::find($product_id);
          $action =$product->product_type;

          if ($product->product_type=='TVL') {
            # code...
            $product->action='travel.show';
            $risk = $policy->risks->first();
            $array->put('risk', $risk);
          }
          else if ($product->product_type=='PA') {
            # code...
            $product->action='pa.show';
            $risk = $policy->parisk;
            $array->put('risk', $risk);
          }
          $array->put('product', $product);
          
        }
        else{
          
          if ($request->is('online/pa*') || $request->is('agent/pa*')) {
            //
            $action ='PA';
            
          }
          elseif ($request->is('online/motor*') || $request->is('agent/motor*')) {
            # code...
            $action ='MTT';
            
          }
        }
        $jumbotron = Jumbotron::where('name','=',$action)->first();
          $array->put('jumbotron', $jumbotron);

          
          $links = Link::all();
          foreach ($links as $link) {
            # code...
            if ($link->name == $action) {
              # code...
              $link->active = 'active';
            }
          }
          $array->put('links', $links);

          $tabs ='quotation';

          if ($request->is('*customers*')) {
            # code...
            $tabs = 'customers';
          }
          elseif ($request->is('*members*')) {
            # code...
            $tabs = 'members';
          }
          elseif ($request->is('*confirm')) {
            # code...
            $tabs = 'confirm';
          }
          
          $array->put('tabs', $tabs);
          View::share($array->all());
          
    }
}
