<?php

namespace App\Http\Controllers\PA;

use Session;
use App\Repositories\PA\IPAPremium;
use App\Models\Master\Link;
use Illuminate\Http\Request;
use App\Models\Master\Product;

use App\Models\Master\Jumbotron;
use App\Models\Common\PolicyHeader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;



class B2CPageController extends Controller
{

    
    public function __construct(Request $request, IPAPremium $repository)
    {
      
        
          $array = collect([            
                       
          ]);
        $product_id = $request->route('product_id');
        $policy = new PolicyHeader();
        $policy_id = $request->route('policy_id');
        $project = $request->route('project');
        if ($project===null) {
          # code...
          $project = 1;
          
        }
        $array->put('project', $project);
        if ($policy_id) {
          //           
          $policy = $repository->getPolicyHeader($policy_id);  
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
