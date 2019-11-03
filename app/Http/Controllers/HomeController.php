<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use App\Jumbotron;
class HomeController extends B2CPageController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $model = Product::orderBy('name')->get();
        $product_type = Jumbotron::orderBy('name')->get();
        return view('home',['model'=>$model, 'product_type'=>$product_type]);
    }
}
