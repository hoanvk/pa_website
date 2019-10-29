<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PAPrice;
use App\Plan;
use App\Product;
use App\Period;
use App\Http\Requests\PAPriceRequest;
class PAPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        //
        $model = PAPrice::where('product_id','=',$product_id)->latest()->paginate(20);
        
        return view('paprices.index')->with(['model'=>$model,'product_id'=>$product_id,'i'=> (request()->input('page', 1) - 1) * 20,
        // 'products'=>$products, 'agents'=>$agents, 'destinations'=>$destinations, 'dayRanges'=>$dayRanges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        //
        $plans = Plan::where('product_id','=',$product_id)->pluck('title', 'id');
        $periods = Period::where('product_id','=',$product_id)->pluck('title', 'id');
       
        return view('paprices.create')->with(['plans'=>$plans,'periods'=>$periods,'product_id'=>$product_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PAPriceRequest $request, $product_id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PAPriceRequest $request, $product_id, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id)
    {
        //
    }
}
