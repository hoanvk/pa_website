<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Risk;
use App\User;
use DateTime;
use App\Agent;
use App\Policy;
use App\Premium;
use App\Product;
use App\DateUtil;
use App\AgentPlan;
use Carbon\Carbon;
use App\SelectList;
use App\Destination;
use App\TravelSeqNo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PolicyFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TravelController extends PageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        

        
        $status = SelectList::policyStatus();
        $policy_type = SelectList::policyType();
        $model = Policy::where('agent_id', "=", $this->agent->id)->latest()->paginate(10);
        return view('travel.index')->with(['model'=>$model, 'status'=>$status,'policy_type'=>$policy_type,
        'i' => (request()->input('page', 1) - 1) * 10]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $quotation_no =Policy::quotation();
        $agent =optional(Auth::user()->agent);
        
        // $agent =Agent::find(Auth::user()->agent_id);

        // $products = Product::pluck('title', 'id'); 
        // $plans = Plan::pluck('title', 'id');  
        
        $plans = Agent::plans()->pluck('title', 'id');

        $destinations = Destination::pluck('title', 'id');
        
        return view('travel.create')->with(['plans'=>$plans,
        'destinations'=>$destinations,
        // 'quotation_no'=>$quotation_no, 
        'agent'=>$agent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicyFormRequest $request)
    {
        //
        //
        $start_date = DateUtil::parseDate(Input::get('start_date'));
        $end_date = DateUtil::parseDate(Input::get('end_date'));

        if (DateUtil::compareDate($start_date, $end_date)) {
            $error = ValidationException::withMessages([
                'start_date' => ['Start date require before end date!']
             ]);
             throw $error;
            
        }

        $quotation_no =TravelSeqNo::quotation_no();  
        $agent =Agent::find(Auth::user()->agent_id);
        

        $plan_id = Input::get('plan_id');
        $product_id  = Plan::find($plan_id)->product_id;
        $destination_id = Input::get('destination_id');
        $policy_type = Input::get('policy_type');
           
        $period = DateUtil::dateDiff($start_date, $end_date);
        $ref_number = Input::get('ref_number');
        $remarks = Input::get('remarks');

        $policy_id = Policy::create(['quotation_no'=> $quotation_no,
        'policy_no'=>'',
        'product_id'=>$product_id,        
        'client_address'=>$agent->address,
        'start_date'=>$start_date,
        'end_date'=>$end_date,
        'agent_id'=>$agent->id,
        'premium'=>0,        
        'period'=>$period,
        'client_name' => $agent->name,
        'client_id' => $agent->taxnum,
        'status'=>'1',
        'client_dob' => Carbon::now(),
        'ref_number'=>$ref_number,
        'remarks'=>$remarks])->id;    

        $dependent_qty = Input::get('dependent_qty');
        $adult_qty = Input::get('adult_qty');
        Risk::create(['policy_id'=> $policy_id,
        'policy_type'=>$policy_type,              
        'premium'=>0,                
        'plan_id' => $plan_id,
        'dependent_qty'=>$dependent_qty,
        'adult_qty'=>$adult_qty,
        'destination_id' => $destination_id]);  
        
        $policy = Policy::find($policy_id);
        $premium = Premium::calculate($policy); 
        $policy->update(['premium'=>$premium]);

        return redirect()->route('travel.show',$policy_id)
                        ->with('success','Travel policy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $model=Policy::find($id);
        $agent =optional($model->agent);
        
        $risk = optional($model->risks->first());
        $policy_type = SelectList::policyType();
        $status = SelectList::policyStatus();
        return view('travel.show')->with(['model'=>$model,'risk'=>$risk, 'status'=>$status, 'agent'=>$agent,'policy_type'=>$policy_type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model=Policy::find($id);
        $agent = $model->agent;
        $destinations = Destination::pluck('title', 'id');
        // $products = Product::pluck('title', 'id');  
        $plans = Agent::plans()->pluck('title', 'id');
        
        $risk = $model->risks->first();
        $model->start_date = date('d/m/Y', strtotime($model->start_date));
        $model->end_date = date('d/m/Y', strtotime($model->end_date));
        $model->adult_qty = $risk->adult_qty;
        $model->dependent_qty = $risk->dependent_qty;
        $model->policy_type = $risk->policy_type;
        $model->plan_id = $risk->plan_id;
        return view('travel.edit')->with(['model'=>$model,'agent'=>$agent, 'risk'=>$risk, 
        'plans'=>$plans, 'destinations'=>$destinations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(PolicyFormRequest $request, $id)
    {
        //
        
        $start_date = DateUtil::parseDate(Input::get('start_date'));
        $end_date = DateUtil::parseDate(Input::get('end_date'));

        if (DateUtil::compareDate($start_date,$end_date)) {
            $error = ValidationException::withMessages([
                'start_date' => ['Start date require before end date!']
             ]);
             throw $error;
            
        }

        $plan_id = Input::get('plan_id');
        $destination_id = Input::get('destination_id');

        $policy = Policy::find($id);

        $premium = Premium::calculate($policy);

        $period = DateUtil::dateDiff($start_date, $end_date);
        $ref_number = Input::get('ref_number');
        $remarks = Input::get('remarks');

        $policy->update([
        'start_date'=>$start_date,
        'end_date'=>$end_date,       
        'ref_number'=>$ref_number,
        'remarks'=>$remarks,      
        'period'=>$period]);       

        $dependent_qty = Input::get('dependent_qty');
        $adult_qty = Input::get('adult_qty');
        $policy_type = Input::get('policy_type');

        $risk = $policy->risks->first();
        $risk->update([          
        'plan_id' => $plan_id,
        'policy_type'=>$policy_type,              
       
        'dependent_qty'=>$dependent_qty,
        'adult_qty'=>$adult_qty,
        'destination_id' => $destination_id]);    

        $policy = Policy::find($id);
        $premium = Premium::calculate($policy); 
        $policy->update(['premium'=>$premium]);

        return redirect()->route('travel.show', $policy)
                        ->with('success','Travel policy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }
    public function confirm($id)
    {
        //
        // inside if(Auth::validate)
// if(User::where('email', $email)->first())
// {
//     $validator->getMessageBag()->add('password', 'Password wrong');
// }
// else
// {
//     $validator->getMessageBag()->add('email', 'Email not found');
// }
        $policy = Policy::find($id);
        if (Premium::withdrawl($policy->agent_id, $policy->premium)) {
            # code...
            $policy_no = Policy::policyNumber($policy->product_id);
            $policy->update(['status'=>'2', 'policy_no'=>$policy_no]);
        return redirect()->route('travel.show', $id)
                        ->with('success','Travel policy issued successfully.');
        }
        else{
            return redirect()->route('travel.show', $id)
                        ->with('error','Travel policy could not issue due to balance limit.');
        }
        
    }
}
