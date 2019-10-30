<?php

namespace App\Http\Controllers;
use App\Plan;
use DateTime;
use App\Period;
use App\Policy;
use App\PASeqNo;
use App\Product;
use App\DateUtil;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;
use App\Http\Requests\PolicyFormRequest;

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
                $end_date = PARisk::coverage($start_date, $period_id);
               
                if (!$end_date) {
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
        $product = Product::find($product_id);
        $plans = Plan::where('product_id','=',$product_id)->pluck('title', 'id');
        $periods = Period::where('product_id','=',$product_id)->pluck('title', 'id');
        $quotation_no =PASeqNo::quotation_no();
        return view('pa.create',['quotation_no'=>$quotation_no,'plans'=>$plans,
        'periods'=>$periods, 'product'=>$product]);
    }
    public function store(PolicyFormRequest $request, $product_id)
    {
        # code...
        // dd(Input::get('content'));
        $quotation_no =TravelSeqNo::quotation_no();       
        $start_date = DateUtil::parseDate(Input::get('start_date'));
        if (!$start_date) {
            $error = ValidationException::withMessages([
                'start_date' => ['Start date is invalid date format (DD/MM/YYYY)!']
             ]);
             throw $error;
            
        }
        $end_date = PARisk::coverage($start_date, $period_id);
        $period_id = Input::get('period_id');
        $period = Period::find($period_id);

        $policy = Policy::create(['quotation_no'=> $quotation_no,
        'policy_no'=>'',
        'product_id'=>$product_id,        
        'client_address'=>$agent->address,
        'start_date'=>$start_date,
        'end_date'=>$end_date,
        'agent_id'=>$agent->id,
        'premium'=>0,        
        'period'=>$period->qty,
        'client_name' => '',
        'client_id' => '',
        'status'=>'1',
        'client_dob' => Carbon::now(),
        'ref_number'=>'',
        'remarks'=>'']);
        $request->session()->flash('status', 'Create '.$quotation_no.' successful!');
        return redirect(route('pa.details'));
    }
    public function show($product_id, $id)
    {
        # code...
        $quotation_no =Policy::quotation();
        $model = Policy::where('quotation_no',$quotation_no)->first();
        return view('pa.details')->with('model',$model);
    }
    public function confirm(Request $request, $product_id, $id)
    {
        # code...
        $quotation_no =Policy::quotation();
        $request->session()->forget('quotation_no');
        $request->session()->flash('status', 'Create '.$quotation_no.' successful!');
        
        return redirect(route('pa.create'));
    }
}