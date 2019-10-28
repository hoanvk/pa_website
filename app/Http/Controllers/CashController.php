<?php

namespace App\Http\Controllers;

use App\Cash;
use Illuminate\Http\Request;
use App\Agent;
class CashController extends AdminPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Cash::latest()->paginate(5);
        
        $agent = Agent::all('name', 'id');
        return view('cashes.index')->with(['model'=>$model,'agent'=>$agent, 'i'=>(request()->input('page', 1) - 1) * 5]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $agent = Agent::pluck('title', 'id');
        return view('cashes.create')->with(['agent'=>$agent]);
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
            'agent_id' => 'required',
            'limit_bal' => 'required',
            'os_bal' => 'required',
        ]);
  
        Cash::create($request->all());
   
        return redirect()->route('cashes.index')
                        ->with('success','Cash created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cash  $cash
     * @return \Illuminate\Http\Response
     */
    public function show(Cash $cash)
    {
        //
        $agent = Agent::all('title', 'id');
        return view('cashes.show')->with(['model'=>$cash,'agent'=>$agent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cash  $cash
     * @return \Illuminate\Http\Response
     */
    public function edit(Cash $cash)
    {
        //
        $agent = Agent::pluck('title', 'id');
        return view('cashes.edit')->with(['model'=>$cash, 'agent'=>$agent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cash  $cash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cash $cash)
    {
        //
        $request->validate([
            'agent_id' => 'required',
            'limit_bal' => 'required',
            'os_bal' => 'required',
        ]);
  
        $cash->update($request->all());
  
        return redirect()->route('cashes.index')
                        ->with('success','Cash updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cash  $cash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cash $cash)
    {
        //
        $cash->delete();
  
        return redirect()->route('cashes.index')
                        ->with('success','Cash deleted successfully');
    }
}
