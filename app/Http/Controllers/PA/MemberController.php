<?php

namespace App\Http\Controllers\PA;

use DateTime;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Repositories\PA\IPAPremium;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Repositories\Common\IDateUtil;
use App\Repositories\Common\ISelectList;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MemberController extends B2CPageController
{
    public function self(Request $request, IPAPremium $repository)
    {
        # code...
        // IDateUtil $dateUtil, IPAPolicy $repository
        
        
        if($request->ajax()){
            
            $ownship=$request->get('ownship');            
            $policy_id = $request->get('policy_id');            
            if ($ownship == '1') {
                # code...
                $member = $repository->getSelfInsured($policy_id);
                    $data = array('member' => $member);
                    echo json_encode($member);
                
            }
            
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($policy_id, ISelectList $selectList, IPAPremium $repository)
    {
        //
        $gender = $selectList->gender();
        $model = $repository->getInsuredList($policy_id);    
        if ($model->count()==0) {
            return redirect()->route('members.create',$policy_id);
        }

        return view('members.index')->with(['model'=>$model,'gender'=>$gender]);
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
        $member = $repository->initInsuredPerson($policy_id);
        return view('members.create')->with(['relationship'=>$relationship, 'country'=>$country, 
            'model'=>$model, 'member'=>$member]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request, $policy_id, IPAPremium $repository, IDateUtil $dateUtil)
    {
        //
        
        $dob = $dateUtil->parseDate(Input::get('dob'));
        
        
        $insured_name = Input::get('insured_name');
        $insured_id = Input::get('insured_id');
        $gender = Input::get('gender');
        $naty = Input::get('naty');
        $ownship = Input::get('ownship');

        $errors = $repository->checkInsuredPerson($policy_id,0,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
        if (count($errors)>0) {
            
            throw ValidationException::withMessages($errors);
            
        }
        $member = $repository->createInsuredPerson($policy_id,0,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
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
    public function edit($policy_id, $id, ISelectList $selectList,IPAPremium $repository)
    {
        //
        $member = $repository->getInsuredPerson($id);
        
        
        $relationship = $selectList->relationship()->pluck('long_desc','item_item');
        $country = $selectList->country()->pluck('name','ctry_code');

        $model = $repository->getInsuredPerson($id);  
        return view('members.edit')->with(['relationship'=>$relationship,'member'=>$member, 'country'=>$country, 'model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $policy_id, $id, IPAPremium $repository, IDateUtil $dateUtil)
    {
        //
        
        $dob = $dateUtil->parseDate(Input::get('dob'));
        
        
        $insured_name = Input::get('insured_name');
        $insured_id = Input::get('insured_id');
        $gender = Input::get('gender');
        $naty = Input::get('naty');
        $ownship = Input::get('ownship');

        $errors = $repository->checkInsuredPerson($policy_id,0,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
        if (count($errors)>0) {
            
            throw ValidationException::withMessages($errors);
            
        }
        $member = $repository->createInsuredPerson($policy_id,$id,$ownship,$insured_name,$insured_id,$dob,$gender,$naty);
        
        return redirect()->route('members.index',$policy_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($policy_id, $id,IPAPremium $repository)
    {
        //
        $errors = $repository->checkRemoveInsured($policy_id);
        if (count($errors)>0) {
            throw ValidationException::withMessages($errors);
        }
        $repository->deleteInsuredPerson($id);

        return redirect()->route('members.index',$policy_id);
    }
}
