<?php

namespace App\Http\Controllers\PA;

use DateTime;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Repositories\Common\ISelectList;
use App\Repositories\PA\IPAPremium;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MemberController extends B2CPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($policy_id, IPAPremium $repository)
    {
        //
        
        $model = $repository->getInsuredList($policy_id);        
        return view('members.index')->with(['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($policy_id, ISelectList $selectList, IPAPremium $repository)
    {
        //        
        
        $relationship = $selectList->relationship()->pluck('long_desc','item_item');
        $country = $selectList->country()->pluck('name','ctry_code');
        $model = $repository->getInsuredList($policy_id);
        $member = $repository->initInsuredPerson();
        return view('members.create')->with(['relationship'=>$relationship, 'country'=>$country, 
            'model'=>$model, 'member'=>$member]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request, $policy_id, IPAPremium $repository)
    {
        //
        
        $dob = DateUtil::parseDate(Input::get('dob'));
        if (DateUtil::compareNow($dob)) {
            $error = ValidationException::withMessages([
                'dob' => ['Date of birth require less than today!']
             ]);
             throw $error;
            
        }
        
        $insured_name = Input::get('insured_name');
        $insured_id = Input::get('insured_id');
        $gender = Input::get('gender');
        $naty = Input::get('naty');
        $ownship = Input::get('ownship');
        $error_code = $repository->checkInsuredPerson($policy_id,0,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
        if ($error_code<0) {
            $error = ValidationException::withMessages([
                'insured_name' => ['Duplicated insured person identity no!']
             ]);
             throw $error;
            
        }
        $member = $repository->createInsuredPerson($policy_id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
        return redirect()->route('members.index',$policy_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($policy_id, $id, ISelectList $selectList, IPAPremium $repository)
    {
        //
        $member = $repository->getInsuredPerson($id);        
        $relationship = $selectList->relationship();
        $gender = $selectList->gender();

        $model = $repository->getInsuredList($policy_id);
        return view('members.show')->with(['member'=>$member, 'relationship'=>$relationship, 
            'gender'=>$gender,'model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($policy_id, $id, IPAPremium $repository)
    {
        //
        $member = $repository->getInsuredPerson($id);
        
        
        $relationship = SelectList::relationship()->pluck('long_desc','item_item');
        $country = SelectList::country()->pluck('name','ctry_code');

        $model = Member::where('policy_id','=',$policy_id)->get();
        return view('members.edit')->with(['relationship'=>$relationship,'member'=>$member, 'country'=>$country, 'model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $policy_id, $id)
    {
        //
        
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
                'age'=>$age
                ]);
        $policy = Policy::find($policy_id);
        if ($policy->status < 4) {
            # code...
            $policy->update(['status' => 4]);

        }
        
        return redirect()->route('members.index',$policy_id);
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
        $model = Member::where('policy_id','=',$policy_id)->get();
        $exists =$model->count();
        echo $exists;
        if ($exists<=1) {
            # code...
            $error = ValidationException::withMessages([
                'id' => ['Could not delete because the policy need at least 1 insured person!']
            ]);
            throw $error;
        }
        $member = Member::find($id);
        $member->delete();

        $policy = Policy::find($policy_id);
        $risk = $policy->parisk;
        $premium = Premium::PACalculate($risk);
        $risk->update(['premium'=>$premium]);
        $policy->update(['premium'=>$premium]);

        return redirect()->route('members.index',$policy_id);
    }
}
