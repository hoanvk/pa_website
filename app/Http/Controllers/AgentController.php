<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AgentFormRequest;

class AgentController extends Controller
{
    //
    public function Index()
    {
        # code...
        $model = Agent::all();
        return view('agents.index', compact('model'));
    }
    public function Create()
    {
        # code...
        return view('agents.create');
    }
    public function Store(AgentFormRequest $request)
    {
        # code...
        // dd(Input::get('content'));
        $title = Input::get('title');        
        $name = Input::get('name'); 
        $taxnum = Input::get('taxnum'); 
        $email = Input::get('email'); 
        $address = Input::get('address'); 
        $client_no = Input::get('client_no');
        Agent::create([
            'title'=> $title,
            'name'=> $name,
            'taxnum'=> $taxnum,
            'email'=> $email,
            'address'=> $address,
            'client_no'=>$client_no
        ]);
        $request->session()->flash('status', 'Create '.$title.' successful!');
        return redirect(route('agents.index'));
    }
    
    public function Details($id)
    {
        # code...
        $model = Agent::find($id);
        return view('agents.details')->with('model',$model);
    }
    public function Edit($id)
    {
        # code...
        $model = Agent::find($id);
        return view('agents.edit')->with('model',$model);
    }
    public function Update($id, AgentFormRequest $request)
    {
        # code...
        $model = Agent::find($id);
        $title = Input::get('title');
        $name = Input::get('name');
        $client_no = Input::get('client_no');
        $taxnum = Input::get('taxnum'); 
        $email = Input::get('email'); 
        $address = Input::get('address'); 
        $model->update([
            'title'=> $title,
            'name'=> $name,
            'taxnum'=> $taxnum,
            'email'=> $email,
            'address'=> $address,
            'client_no'=>$client_no
        ]);
        $request->session()->flash('status', 'Update '.$title.' successful!');
        return redirect(route('agents.index'));
    }
}
