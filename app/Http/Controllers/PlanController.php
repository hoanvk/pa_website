<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Product;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Plan::latest()->paginate(5);
        return view('plans.index')->with(['i'=> (request()->input('page', 1) - 1) * 5,
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
    public function store(Request $request)
    {
        //
        Plan::create($request->all());
   
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
    public function update(PlanRequest $request, $id)
    {
        //
        $model =Plan::find($id);
        $model->update($request->all());
  
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
