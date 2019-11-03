<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Period;
use App\PAPrice;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\PAPriceRequest;
use Illuminate\Support\Facades\Input;

class PAPriceController extends AdminPageController
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
        $amount = Input::get('amount');
        $plan_id = Input::get('plan_id');
        $period_id = Input::get('period_id');

        PAPrice::create(['product_id'=>$product_id, 'amount'=>$amount, 'plan_id'=>$plan_id, 'period_id'=>$period_id]);
   
        return redirect()->route('paprices.index', $product_id)
                        ->with('success','Prices created successfully.');
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
        $model = PAPrice::find($id);        
        return view('paprices.show')->with(['model'=>$model]);
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
        $model = PAPrice::find($id);
        $plans = Plan::where('product_id','=',$product_id)->pluck('title', 'id');
        $periods = Period::where('product_id','=',$product_id)->pluck('title', 'id');
        return view('paprices.edit')->with(['model'=>$model,'plans'=>$plans,'periods'=>$periods]);
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
        $amount = Input::get('amount');
        $plan_id = Input::get('plan_id');
        $period_id = Input::get('period_id');
        $model = PAPrice::find($id);
        $model->update(['amount'=>$amount, 'plan_id'=>$plan_id, 'period_id'=>$period_id]);
   
        return redirect()->route('paprices.index', $product_id)
                        ->with('success','Prices created successfully.');
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
        $model = PAPrice::find($id);
        $model->delete();
  
        return redirect()->route('paprices.index', $product_id)
                        ->with('success','Price deleted successfully');
    }
}
