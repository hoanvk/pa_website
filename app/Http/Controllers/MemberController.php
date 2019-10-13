<?php

namespace App\Http\Controllers;

use DateTime;
use App\Member;
use App\Policy;
use App\DateUtil;
use Carbon\Carbon;
use App\SelectList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($policy_id)
    {
        //
        $agent =optional(Auth::user()->agent);
        $model = Member::where('policy_id','=',$policy_id)->get();
        $policy = Policy::find($policy_id);
        $risk = $policy->risks->first();
        return view('members.index')->with(['agent'=>$agent,'model'=>$model, 
            'policy_id'=>$policy_id, 'policy'=>$policy, 'risk'=>$risk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($policy_id)
    {
        //        
        $agent =optional(Auth::user()->agent);
        $relationship = SelectList::relationship()->pluck('long_desc','item_item');
        $country = SelectList::country()->pluck('long_desc','item_item');
        $policy = Policy::find($policy_id);
        $risk = $policy->risks->first();
        return view('members.create')->with(['policy_id'=>$policy_id,       
        'agent'=>$agent, 'relationship'=>$relationship, 'policy'=>$policy, 'risk'=>$risk,'country'=>$country]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($policy_id, Request $request)
    {
        //
        $request->validate([
            'insured_name' => 'required',
            'insured_id' => 'required',
            'dob' => 'required',
            'naty' => 'required',
            'gender' => 'required',
            'ownship' => 'required'
        ]);

        $dob = DateUtil::parseDate(Input::get('dob'));
        if (DateUtil::compareNow($dob)) {
            $error = ValidationException::withMessages([
                'dob' => ['Date of birth require less than today!']
             ]);
             throw $error;
            
        }
        $age    = DateUtil::age($dob);
        $insured_name = Input::get('insured_name');
        $insured_id = Input::get('insured_id');
        $gender = Input::get('gender');
        $naty = Input::get('naty');
        $ownship = Input::get('ownship');
                Member::create(['insured_name' => $insured_name,
                'insured_id'=>$insured_id,
                'dob'=>$dob,
                'naty'=>$naty,
                'gender'=>$gender,
                'ownship'=>$ownship,
                'policy_id'=>$policy_id,
                'age'=>$age
                ]
            );
   
        return redirect()->route('members.index',$policy_id)
                        ->with('success','Insured person created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($policy_id, $id)
    {
        //
        $agent =optional(Auth::user()->agent);
        $member = Member::find($id);
        $model = Member::where('policy_id','=',$policy_id)->get();
        $policy = Policy::find($policy_id);
        $risk = $policy->risks->first();
        $relationship = SelectList::relationship();
        $gender = SelectList::gender();
        return view('members.show')->with(['model'=>$model, 'member'=>$member,'policy_id'=>$policy_id,'agent'=>$agent, 
            'policy'=>$policy, 'risk'=>$risk, 'relationship'=>$relationship, 'gender'=>$gender]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($policy_id, $id)
    {
        //
        $model = Member::find($id);
        $model->dob = date('d/m/Y', strtotime($model->dob));
        $agent =optional(Auth::user()->agent);
        $relationship = SelectList::relationship()->pluck('long_desc','item_item');
        $country = SelectList::country()->pluck('long_desc','item_item');
        $policy = Policy::find($policy_id);
        $risk = $policy->risks->first();
        return view('members.edit')->with(['policy_id'=>$policy_id,       
        'agent'=>$agent, 'relationship'=>$relationship,'model'=>$model, 'policy'=>$policy, 'risk'=>$risk,'country'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $policy_id, $id)
    {
        //
        $request->validate([
            'insured_name' => 'required',
            'insured_id' => 'required',
            'dob' => 'required',
            'naty' => 'required',
            'gender' => 'required',
            'ownship' => 'required'
        ]);
        $dob = DateUtil::parseDate(Input::get('dob'));
        if (DateUtil::compareNow($dob)) {
            $error = ValidationException::withMessages([
                'dob' => ['Date of birth require less than today!']
            ]);
            throw $error;
            
        }
        $age    = DateUtil::age($dob);
        
        $insured_name = Input::get('insured_name');
        $insured_id = Input::get('insured_id');
        $gender = Input::get('gender');
        $naty = Input::get('naty');
        $ownship = Input::get('ownship');

        $model = Member::find($id);
        $model->update(['insured_name' => $insured_name,
                'insured_id'=>$insured_id,
                'dob'=>$dob,
                'naty'=>$naty,
                'gender'=>$gender,
                'ownship'=>$ownship,
                'policy_id'=>$policy_id,
                'age'=>$age
                ]);
        return redirect()->route('members.index',$policy_id)
                        ->with('success','Insured person updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($policy_id, $id)
    {
        //
    }
}
