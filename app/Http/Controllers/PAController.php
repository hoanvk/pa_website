<?php

namespace App\Http\Controllers;
use App\Plan;
use DateTime;
use App\Agent;
use App\PARisk;
use App\Period;
use App\Policy;
use App\PASeqNo;

use App\Premium;


use App\Product;
use App\DateUtil;
use Carbon\Carbon;
use App\SelectList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PAPolicyRequest;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

class PAController extends B2CPageController
{
    public function period(Request $request)
    {
        # code...
        
        if($request->ajax()){
            
            $start_date=$request->get('start_date');            
            $period_id=$request->get('period_id');

            // $data = array('end_date' => $start_date);
            //     echo json_encode($data);

            if ($start_date != '' && $period_id != 0) {
                # code...
                $start_date=DateUtil::parseDate($start_date);
                $end_date = PARisk::coverage($start_date, $period_id);
               
                if ($end_date) {
                    # code...                    
                    $end_date = date('d/m/Y', strtotime($end_date));
                    
                    $data = array('end_date' => $end_date);
                    echo json_encode($data);
                }
                
            }
            
            
        }
        
    }

    public function index()
    {
        # code...
        $model = Product::where('product_type','=','PA')->orderBy('name')->get();
        return view('pa.index')->with(['model'=>$model]);
    }
    
    public function create($product_id)
    {
        # code...
        
        $plans = Plan::where('product_id','=',$product_id)->pluck('title', 'id');
        $periods = Period::where('product_id','=',$product_id)->pluck('title', 'id');
        
        return view('pa.create',['plans'=>$plans,
            'periods'=>$periods]);
    }
    public function store(PAPolicyRequest $request, $product_id)
    {
        # code...
        // dd(Input::get('content'));
        $quotation_no =PASeqNo::quotation_no();       
        $start_date = DateUtil::parseDate(Input::get('start_date'));
        if (!$start_date) {
            $error = ValidationException::withMessages([
                'start_date' => ['Start date is invalid date format (DD/MM/YYYY)!']
             ]);
             throw $error;
            
        }
        
        //
        $promo_code = Input::get('promo_code');

        $period_id = Input::get('period_id');
        $plan_id = Input::get('plan_id');
        $end_date = PARisk::coverage($start_date, $period_id);
        $period = Period::find($period_id);

        //Get default Agent for online customer
        $product = Product::find($product_id);
        $agent = Agent::find($product->agent_id);
        
        $policy = Policy::create(['quotation_no'=> $quotation_no,
        'policy_no'=>'',
        'product_id'=>$product_id,        
        
        'start_date'=>$start_date,
        'end_date'=>$end_date,
        'agent_id'=>$agent->id,
        'premium'=>0,        
        'period'=>$period->qty,
        // 'customer_id'=>0,
        'status'=>'1',        
        ]);

        $risk = PARisk::create(['policy_id'=> $policy->id,                 
        'premium'=>0,                
        'plan_id' => $plan_id,
        'period_id' => $period_id,
        'promo_code' =>$promo_code]);  
        
        
        $premium = Premium::PACalculate($risk); 
        $policy->update(['premium'=>$premium]);
        $risk->update(['premium'=>$premium]);        

        return redirect()->route('customers.create',['policy_id'=>$policy->id]);
        
    }
    public function show($product_id, $policy_id)
    {
        # code... 
           
        $model = Policy::find($policy_id);        
        $risk = $model->parisk;
        $status = SelectList::policyStatus();
        
        return view('pa.show')->with(['model'=>$model,'status'=>$status,'risk'=>$risk]);
    }
    public function edit($product_id, $policy_id)
    {
        //
        $model=Policy::find($policy_id);
        
        $plans = Plan::where('product_id','=',$product_id)->pluck('title', 'id');
        $periods = Period::where('product_id','=',$product_id)->pluck('title', 'id');
        
        $risk = $model->parisk;
        $model->start_date = date('d/m/Y', strtotime($model->start_date));
        $model->end_date = date('d/m/Y', strtotime($model->end_date));
        
        $model->plan_id = $risk->plan_id;
        $model->period_id = $risk->period_id;
        return view('pa.edit')->with(['model'=>$model,'plans'=>$plans,
        'periods'=>$periods]);
    }
    public function update(PAPolicyRequest $request, $product_id, $policy_id)
    {
        # code...
        // dd(Input::get('content'));
             
        $start_date = DateUtil::parseDate(Input::get('start_date'));
        if (!$start_date) {
            $error = ValidationException::withMessages([
                'start_date' => ['Start date is invalid date format (DD/MM/YYYY)!']
             ]);
             throw $error;
            
        }
        
        //
        $promo_code = Input::get('promo_code');

        $period_id = Input::get('period_id');
        $plan_id = Input::get('plan_id');
        $end_date = PARisk::coverage($start_date, $period_id);
        $period = Period::find($period_id);
        
        $policy = Policy::find($policy_id);
        $policy->update([        
        'start_date'=>$start_date,
        'end_date'=>$end_date,

        'premium'=>0,        
        'period'=>$period->qty,

        ]);

        $risk = $policy->parisk;
        $risk->update(['policy_id'=> $policy->id,                 
        'premium'=>0,                
        'plan_id' => $plan_id,
        'period_id' => $period_id,
        'promo_code' =>$promo_code]);  
        
        
        $premium = Premium::PACalculate($risk); 
        $policy->update(['premium'=>$premium]);
        $risk->update(['premium'=>$premium]);        

        return redirect()->route('pa.show',['product_id'=>$product_id, 'policy_id'=>$policy_id ]);
        
    }
    public function confirm($policy_id)
    {
        # code...
        $model = Policy::find($policy_id);        
        $risk = $model->parisk;
        $status = SelectList::policyStatus();
        
        return view('pa.confirm')->with(['model'=>$model,'status'=>$status,'risk'=>$risk]);
    }
}