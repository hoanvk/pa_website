<?php

namespace App\Http\Controllers;

use App\DayRange;
use Illuminate\Http\Request;

class DayRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dayRanges = DayRange::latest()->paginate(5);
        return view('dayranges.index', compact('dayRanges'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dayranges.create');
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
            'day_from' => 'required',
            'day_to' => 'required',
            'title' => 'required',
        ]);
  
        DayRange::create($request->all());
   
        return redirect()->route('dayranges.index')
                        ->with('success','Day range created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DayRange  $dayRange
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $model=DayRange::find($id);
        return view('dayranges.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DayRange  $dayRange
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model=DayRange::find($id);
        return view('dayranges.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DayRange  $dayRange
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $request->validate([
            'day_from' => 'required',
            'day_to' => 'required',
            'title' => 'required',
        ]);
        $model=DayRange::find($id);
        $model->update($request->all());
  
        return redirect()->route('dayranges.index')
                        ->with('success','Day range updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DayRange  $dayRange
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model=DayRange::find($id);
        $model->delete();
  
        return redirect()->route('dayranges.index')
                        ->with('success','Day range deleted successfully');
    }
}
