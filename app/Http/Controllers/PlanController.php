<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PlanRequest;
class PlanController extends AdminPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Plan::orderBy('product_id')->paginate(15);
        return view('plans.index')->with(['i'=> (request()->input('page', 1) - 1) * 15,
            'model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::pluck('title', 'id');
        return view('plans.create')->with(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        //
        $name = Input::get('name');
        $title = Input::get('title');
        $product_id = Input::get('product_id');
        Plan::create(['name'=>$name,
        'title'=>$title,
        'product_id'=>$product_id]);
   
        return redirect()->route('plans.index')
                        ->with('success','Plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $model =Plan::find($id);
        return view('plans.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model =Plan::find($id);
        $products = Product::pluck('title', 'id');
        return view('plans.edit',compact('model'))->with(['model'=>$model, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update($id, PlanRequest $request)
    {
        //
        $model =Plan::find($id);
        $name = Input::get('name');
        $title = Input::get('title');
        $product_id = Input::get('product_id');
        $model->update(['name'=>$name,
            'title'=>$title,
            'product_id'=>$product_id]);
  
        return redirect()->route('plans.index')
                        ->with('success','Plan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model =Plan::find($id);
        $model->delete();
  
        return redirect()->route('plans.index')
                        ->with('success','Plan deleted successfully');
    }
}
