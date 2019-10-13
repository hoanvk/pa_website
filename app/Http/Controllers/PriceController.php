<?php

namespace App\Http\Controllers;

use App\Price;
use App\Plan;
use App\Agent;
use App\Destination;
use App\DayRange;
use App\Http\Requests\PriceRequest;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prices = Price::latest()->paginate(10);
        // $agents = Agent::all('name', 'id');
        // $products = Product::all('name', 'id');
        // $destinations = Destination::all('name', 'id');
        // $dayRanges = DayRange::all('title', 'id');
        return view('prices.index')->with(['prices'=>$prices,'i'=> (request()->input('page', 1) - 1) * 10,
        // 'products'=>$products, 'agents'=>$agents, 'destinations'=>$destinations, 'dayRanges'=>$dayRanges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $plans = Plan::pluck('title', 'id');
        $agents = Agent::pluck('title', 'id');
        $destinations = Destination::pluck('title', 'id');
        $dayRanges = DayRange::pluck('title', 'id');
        return view('prices.create')->with(['plans'=>$plans,'agents'=>$agents,
        'destinations'=>$destinations,'dayRanges'=>$dayRanges]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceRequest $request)
    {
        //
        
        Price::create($request->all());
   
        return redirect()->route('prices.index')
                        ->with('success','Prices created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        
        return view('prices.show')->with(['price'=>$price]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
        $plans = Plan::pluck('title', 'id');
        $agents = Agent::pluck('title', 'id');
        $destinations = Destination::pluck('title', 'id');
        $dayRanges = DayRange::pluck('title', 'id');
        return view('prices.edit')->with(['price'=>$price, 'plans'=>$plans,'agents'=>$agents,
        'destinations'=>$destinations,'dayRanges'=>$dayRanges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
        
        $price->update($request->all());
  
        return redirect()->route('prices.index')
                        ->with('success','Price updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
        //
        $price->delete();
  
        return redirect()->route('prices.index')
                        ->with('success','Price deleted successfully');
    }
}
