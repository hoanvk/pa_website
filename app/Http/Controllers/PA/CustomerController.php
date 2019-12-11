<?php

namespace App\Http\Controllers\PA;

use Illuminate\Http\Request;
use App\Models\Common\Customer;
use App\Repositories\PA\IPAPremium;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\CustomerRequest;
use App\Repositories\Common\IDateUtil;
use App\Repositories\Common\ISelectList;
use Illuminate\Validation\ValidationException;

class CustomerController extends B2CPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($policy_id, ISelectList $selectList)
    {
        //
        
        $cities = $selectList->province()->pluck('title','name');
        $countries = $selectList->country()->pluck('name','ctry_code');
        $customer = new Customer();
        $customer->natlty = 'VN';        
        return view('customers.create')->with(['customer'=>$customer, 'cities'=>$cities, 'countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request, $policy_id, IDateUtil $dateUtil, IPAPremium $repository)
    {
        //
        $dob = $dateUtil->parseDate(Input::get('dob'));
        
        $name = Input::get('name');
        $tgram = Input::get('tgram');
        $gender = Input::get('gender');
        $natlty = Input::get('natlty');
        $city = Input::get('city');
        $mobile = Input::get('mobile');
        $address = Input::get('address');
        $email = Input::get('email');

        $errors = $repository->checkPolicyHolder($name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email);
        if (count($errors)>0) {
            throw ValidationException::withMessages($errors);
        }
        
        $customer = $repository->createPolicyHolder($policy_id,$name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email);
        
        return redirect()->route('customers.show',['policy_id'=>$policy_id, 'id'=>$customer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($policy_id, $id, ISelectList $selectList, IPAPremium $repository)
    {
        $customer = $repository->getPolicyHolder($policy_id);
        //
        if ($customer===null) {
            return redirect()->route('customers.create',$policy_id);                   
            
         }
         else {
                         
            $gender = $selectList->gender();
            return view('customers.show')->with(['customer'=>$customer,'gender'=>$gender]);
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($policy_id, $id, ISelectList $selectList, IPAPremium $repository)
    {
        //        
        $countries = $selectList->country()->pluck('name','ctry_code');
        $cities = $selectList->province()->pluck('title','name');
        
        $customer = $repository->getPolicyHolder($policy_id);
        
        return view('customers.edit')->with(['countries'=>$countries, 'cities'=>$cities, 'customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $policy_id, $id)
    {
        //
        $dob = DateUtil::parseDate(Input::get('dob'));
        
        $name = Input::get('name');
        $tgram = Input::get('tgram');
        $gender = Input::get('gender');
        $natlty = Input::get('natlty');
        $city = Input::get('city');
        $mobile = Input::get('mobile');
        $address = Input::get('address');
        $email = Input::get('email');

        $errors = $repository->checkPolicyHolder($name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email);
        if (count($errors)>0) {
            throw ValidationException::withMessages($errors);
        }
        $customer=$repository->createPolicyHolder($policy_id,$name,$tgram,$dob,$gender,$city,$natlty,$mobile,$address,$email);
            
        return redirect()->route('customers.show',['policy_id'=>$policy_id,'id'=>$customer->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
