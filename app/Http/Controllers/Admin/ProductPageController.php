<?php

namespace App\Http\Controllers\Admin;

use Session;


use Illuminate\Http\Request;

use App\Models\Master\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ProductPageController extends Controller
{
    //
    
    public function __construct(Request $request)
    {
        
          $this->product = Product::find($request->product_id);                   
          View::share(['product'=> $this->product]);
          
    }
}
