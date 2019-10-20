<?php

namespace App\Http\Controllers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Services\MicrositeSelector;
use App\Policy;
use App\PASeqNo;
use Illuminate\Support\Facades\Input;
use DateTime;
use App\Http\Requests\PolicyFormRequest;
use Carbon\Carbon;
use App\Destination;
use App\Plan;
use App\Product;
class PAController extends B2CPageController
{
    public function index()
    {
        # code...
        $model = Product::where('product_type','=','PA')->orderBy('name')->get();
        return view('pa.index')->with(['model'=>$model]);
    }
    
    public function create()
    {
        # code...
        $plans = Plan::pluck('title', 'id');
        $destinations = Destination::pluck('title', 'id');
        $quotation_no =PASeqNo::quotation_no();
        return view('pa.create',['quotation_no'=>$quotation_no,'plans'=>$plans,
        'destinations'=>$destinations]);
    }
    public function Store(PolicyFormRequest $request)
    {
        # code...
        // dd(Input::get('content'));
        $quotation_no =Policy::quotation();        
        $insured_name = Input::get('insured_name');
        $insured_id = Input::get('insured_id');
        $insured_dob = DateTime::createFromFormat('d/m/Y', Input::get('insured_dob'));
        Policy::create([
            'quotation_no'=> $quotation_no,
            'cont_type'=>'PAI',
            'policy_no'=>'',
            'insured_address'=>'',
            'start_date'=>Carbon::now(),
            'end_date'=>Carbon::now(),
            'agent_code'=>'',
            'premium'=>0,
            'plan_code'=>'',
            'period'=>0,
            'insured_name' => $insured_name,
            'insured_id' => $insured_id,
            'insured_dob' => $insured_dob
        ]);
        $request->session()->flash('status', 'Create '.$quotation_no.' successful!');
        return redirect(route('pa.details'));
    }
    public function Details()
    {
        # code...
        $quotation_no =Policy::quotation();
        $model = Policy::where('quotation_no',$quotation_no)->first();
        return view('pa.details')->with('model',$model);
    }
    public function confirm(Request $request)
    {
        # code...
        $quotation_no =Policy::quotation();
        $request->session()->forget('quotation_no');
        $request->session()->flash('status', 'Create '.$quotation_no.' successful!');
        
        return redirect(route('pa.create'));
    }
}