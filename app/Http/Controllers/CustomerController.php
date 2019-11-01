<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DateUtil;
use App\SelectList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CustomerRequest;

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
    public function create($policy_id)
    {
        //
        
        $cities = SelectList::province()->pluck('title','name');
        $countries = SelectList::country()->pluck('name','ctry_code');
        $model = new Customer();
        $model->natlty = 'VN';        
        return view('customers.create')->with(['model'=>$model, 'cities'=>$cities, 'countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request, $policy_id)
    {
        //
        $dob = DateUtil::parseDate(Input::get('dob'));
        if (DateUtil::compareNow($dob)) {
            $error = ValidationException::withMessages([
                'dob' => ['Date of birth require less than today!']
             ]);
             throw $error;
            
        }
        
        $name = Input::get('name');
        $tgram = Input::get('tgram');
        $gender = Input::get('gender');
        $natlty = Input::get('natlty');
        $city = Input::get('city');
        $mobile = Input::get('mobile');
        Customer::create(['name' => $name,
                'tgram'=>$tgram,
                'dob'=>$dob,
                'natlty'=>$natlty,
                'gender'=>$gender,
                'city'=>$city,
                'policy_id'=>$policy_id,
                'mobile'=>$mobile,
                'status'=>'1'
                ]
            );
   
        return redirect()->route('members.index',$policy_id);
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
        if (Customer::where('id', '=', $id)->exists()) {
            // user found                        
            $customer = Customer::find($id);
            return view('customers.show')->with(['customer'=>$customer]);
         }
         else {
             
            return redirect()->route('customers.create',$policy_id);
         }
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
        $countries = SelectList::country()->pluck('title','name');
        $cities = SelectList::province()->pluck('title','name');
        
        $customer = Customer::find($id);
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
        if (DateUtil::compareNow($dob)) {
            $error = ValidationException::withMessages([
                'dob' => ['Date of birth require less than today!']
             ]);
             throw $error;
            
        }
        
        $name = Input::get('name');
        $tgram = Input::get('tgram');
        $gender = Input::get('gender');
        $natlty = Input::get('natlty');
        $city = Input::get('city');
        $mobile = Input::get('mobile');
        Customer::create(['name' => $name,
            'tgram'=>$tgram,
            'dob'=>$dob,
            'natlty'=>$natlty,
            'gender'=>$gender,
            'city'=>$city,
            'policy_id'=>$policy_id,
            'mobile'=>$mobile
            ]
        );
   
        return redirect()->route('customers.show',['policy_id'=>$policy_id,'id'=>$id]);
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
