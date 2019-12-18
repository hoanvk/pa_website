<?php

namespace App\Http\Controllers\PA;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\PAPolicyRequest;

use App\Repositories\PA\IPAPremium;
use App\Repositories\Common\IDateUtil;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Common\ISelectList;
use Illuminate\Validation\ValidationException;

class PAController extends B2CPageController
{

    public function period(Request $request, IDateUtil $dateUtil, IPAPremium $repository)
    {
        # code...
        // IDateUtil $dateUtil, IPAPolicy $repository
        
        
        if($request->ajax()){
            
            $start_date=$request->get('start_date');            
            $period_id=$request->get('period_id');

            // $data = array('end_date' => $start_date);
            //     echo json_encode($data);

            if ($start_date != '' && $period_id != 0) {
                # code...
                $start_date=$dateUtil->parseDate($start_date);
                $end_date = $repository->coverage($start_date, $period_id);
               
                if ($end_date) {
                    # code...                    
                    $end_date = $dateUtil->formatDate($end_date);
                    
                    $data = array('end_date' => $end_date);
                    echo json_encode($data);
                }
                
            }
            
        }
        
    }

    public function index(ISelectList $selectList, $project)
    {
        # code...
        $model = $selectList->productLine('PA');
        return view('pa.index')->with(['model'=>$model]);
    }
    
    public function create($product_id, ISelectList $selectList)
    {
        # code...
        
        $plans = $selectList->productPlan($product_id);
        $periods = $selectList->productPeriod($product_id);
        
        return view('pa.create',['plans'=>$plans,
            'periods'=>$periods]);
    }
    public function store(PAPolicyRequest $request, $product_id, IDateUtil $dateUtil, IPAPremium $repository)
    {
        # code...
        
        $start_date = $dateUtil->parseDate(Input::get('start_date'));        
        $promo_code = Input::get('promo_code');
        
        $period_id = Input::get('period_id');        
        $plan_id = Input::get('plan_id');
        
        $end_date = $repository->coverage($dateUtil->parseDate(Input::get('start_date')), $period_id);
        $errors = $repository->checkPolicy(0, $start_date,
            $product_id,        
            $period_id,
            $plan_id, 
            $promo_code);
          
        if (count($errors)>0) {
            throw ValidationException::withMessages($errors);
        }

        $policy = $repository->createPolicy(0, $start_date,$end_date,
            $product_id,        
            $period_id,
            $plan_id, 
            $promo_code);

        return redirect()->route('customers.create',['policy_id'=>$policy->id]);
        
    }
    public function show($product_id, $policy_id, IPAPremium $repository)
    {
        # code... 
           
        $model = $repository->getPolicyHeader($policy_id);        
        $risk = $model->parisk;
        
        
        return view('pa.show')->with(['model'=>$model,'risk'=>$risk]);
    }
    public function edit($product_id, $policy_id,ISelectList $selectList, IPAPremium $repository)
    {
        //
        $model=$repository->getPolicyHeader($policy_id);        
        $plans = $selectList->productPlan($product_id);
        $periods = $selectList->productPeriod($product_id);
        
        $risk = $model->parisk;
        
        $model->plan_id = $risk->plan_id;
        $model->period_id = $risk->period_id;
        return view('pa.edit')->with(['model'=>$model,'plans'=>$plans,
        'periods'=>$periods]);
    }
    public function update(PAPolicyRequest $request, $product_id, $policy_id, IDateUtil $dateUtil, IPAPremium $repository)
    {
        # code...
        // dd(Input::get('content'));
             
        $start_date=Input::get('start_date');
        $start_date = $dateUtil->parseDate($start_date);  
        
        $promo_code = Input::get('promo_code');

        $period_id = Input::get('period_id');
                
        $end_date = $repository->coverage($dateUtil->parseDate(Input::get('start_date')), $period_id);
        $plan_id = Input::get('plan_id');        
        
        $errors = $repository->checkPolicy($policy_id, $start_date,
            $product_id,        
            $period_id,
            $plan_id, 
            $promo_code);

        if (count($errors)>0) {
            throw ValidationException::withMessages($errors);
        }
        
        $policy = $repository->createPolicy($policy_id, $start_date,$end_date,
            $product_id,        
            $period_id,
            $plan_id, 
            $promo_code);

        return redirect()->route('pa.show',['product_id'=>$product_id, 'policy_id'=>$policy_id ]);
        
    }
    public function confirm($policy_id, IPAPremium $repository)
    {
        # code...
        $model = $repository->getPolicyHeader($policy_id);   
        $customer = $repository->getPolicyHolder($policy_id);    
        $risk = $model->parisk;
        // $status = $selectList->policyStatus();
        
        return view('pa.confirm')->with(['model'=>$model,'risk'=>$risk,'customer'=>$customer]);
    }
}