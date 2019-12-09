<?php

namespace App\Http\Controllers\PA;

use App\Customer;
use App\DateUtil;
use App\SelectList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CustomerRequest;
use App\Policy;
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
    public function create($policy_id)
    {
        //
        
        $cities = SelectList::province()->pluck('title','name');
        $countries = SelectList::country()->pluck('name','ctry_code');
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
        $address = Input::get('address');
        $email = Input::get('email');
        $customer = Customer::create(['name' => $name,
                'tgram'=>$tgram,
                'dob'=>$dob,
                'natlty'=>$natlty,
                'gender'=>$gender,
                'city'=>$city,
                'policy_id'=>$policy_id,
                'mobile'=>$mobile,
                'address'=>$address,
                'email'=>$email,
                'status'=>'1'
                ]
            );
        $policy = Policy::find($policy_id);
        
        if ($policy->status < 3) {
            # code...
            $policy->update(['status'=>3]);
        }
        $policy->update(['customer_id'=>$customer->id]);
        return redirect()->route('customers.show',['policy_id'=>$policy_id, 'id'=>$customer->id]);
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
            $gender = SelectList::gender();
            return view('customers.show')->with(['customer'=>$customer,'gender'=>$gender]);
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
        $countries = SelectList::country()->pluck('name','ctry_code');
        $cities = SelectList::province()->pluck('title','name');
        
        $customer = Customer::find($id);
        $customer->dob = date('d/m/Y', strtotime($customer->dob));
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
        $address = Input::get('address');
        $email = Input::get('email');
        $customer = Customer::find($id);
        $customer->update(['name' => $name,
                'tgram'=>$tgram,
                'dob'=>$dob,
                'natlty'=>$natlty,
                'gender'=>$gender,
                'city'=>$city,
                'policy_id'=>$policy_id,
                'mobile'=>$mobile,
                'address'=>$address,
                'email'=>$email
                ]
            );
            $policy = Policy::find($policy_id);
            if ($policy->status < 3) {
                # code...
                $policy->update(['status'=>3]);
            }
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
