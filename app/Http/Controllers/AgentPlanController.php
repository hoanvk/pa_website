<?php

namespace App\Http\Controllers;
use App\Plan;
use App\Agent;
use App\AgentPlan;
use Illuminate\Http\Request;
use App\Http\Requests\AgentPlanRequest;
class AgentPlanController extends AdminPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = AgentPlan::latest()->paginate(5);
        
        return view('agentplans.index')->with(['model'=>$model,'i'=> (request()->input('page', 1) - 1) * 5,]);
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
       
        return view('agentplans.create')->with(['plans'=>$plans,'agents'=>$agents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentPlanRequest $request)
    {
        //
        AgentPlan::create($request->all());
   
        return redirect()->route('agentplans.index')
                        ->with('success','Agent plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AgentPlan  $agentPlan
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $model = AgentPlan::find($id);
        return view('agentplans.show')->with(['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AgentPlan  $agentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plans = Plan::pluck('title', 'id');
        $agents = Agent::pluck('title', 'id');
        $model = AgentPlan::find($id);
        return view('agentplans.edit')->with(['model'=>$model, 'plans'=>$plans,'agents'=>$agents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AgentPlan  $agentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(AgentPlanRequest $request, $id)
    {
        //
        $model = AgentPlan::find($id);
        $model->update($request->all());
  
        return redirect()->route('agentplans.index')
                        ->with('success','Agent plan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AgentPlan  $agentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = AgentPlan::find($id);
        $model->delete();
  
        return redirect()->route('agentplans.index')
                        ->with('success','Agent plan deleted successfully');
    }
}
