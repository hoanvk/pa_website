<?php

namespace App\Http\Controllers\Admin;


use App\Repositories\PA\IPAPremium;

use App\Models\Master\Agent;
use Illuminate\Http\Request;
use App\Models\Master\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Common\IDateUtil;
use App\Repositories\Common\ISelectList;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IDateUtil $dateUtil, IPAPremium $repository)
    {
        //
        $start_date = $dateUtil->parseDate('25/12/1981');
        $start_date = $dateUtil->formatDate($start_date);
        $end_date = $repository->coverage($dateUtil->parseDate('15/12/1981'), 1);
        $end_date = $dateUtil->formatDate($end_date);
        $products = Product::latest()->paginate(10);
        return view('products.index')->with(['i'=> (request()->input('page', 1) - 1) * 10,'products'=>$products,
            'start_date'=>$start_date, 'end_date'=>$end_date
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ISelectList $selectList)
    {
        //
        $product_type = $selectList->productType()->pluck('long_desc','item_item');
        $agents = Agent::pluck('title', 'id');
        return view('products.create')->with(['product_type'=>$product_type,'agents'=>$agents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'title' => 'required',
        ]);
            
        Product::create($request->all());
   
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,ISelectList $selectList)
    {
        //
        $agents = Agent::pluck('title', 'id');
        $product_type = $selectList->productType()->pluck('long_desc','item_item');
        return view('products.edit')->with(['product'=>$product, 'product_type'=>$product_type,'agents'=>$agents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'agent_id'=>'required',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
