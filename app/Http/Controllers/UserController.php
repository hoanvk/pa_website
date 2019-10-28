<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Role;
use App\Agent;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends AdminPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = User::latest()->paginate(5);
        $role = Role::all('title', 'id');
        $agent = Agent::all('title', 'id');
        return view('users.index')->with(['model'=>$model,'role'=>$role, 'agent'=>$agent, 'i'=>(request()->input('page', 1) - 1) * 5]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::pluck('title', 'id');
        $agent = Agent::pluck('title', 'id');
        return view('users.create')->with(['role'=>$role,'agent'=>$agent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        //
        $name = Input::get('name');
        $email = Input::get('email');
       
        $password = Hash::make(Input::get('password'));
        $role_id = Input::get('role_id');
        $agent_id = Input::get('agent_id');        
  
 
    
        User::create(['name'=> $name,
        'email' => $email,
        'password' => $password,
        'role_id' => $role_id,
        'agent_id' => $agent_id]);
   
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        
        $role = Role::all('title', 'id');
        $agent = Agent::all('title', 'id');
        return view('users.show')->with(['model'=>$user,'role'=>$role,'agent'=>$agent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
       
        $role = Role::pluck('title', 'id');
        $agent = Agent::pluck('title', 'id');
        return view('users.edit')->with(['model'=>$user,'role'=>$role,'agent'=>$agent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, User $user)
    {
        //
        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        if ($password == null) {
            $password = $user->password;
              # code...
          }
        else
        {
            $password = Hash::make($password);
        }
        $role_id = Input::get('role_id');
        $agent_id = Input::get('agent_id');        
  
  $user->update([
    'name'=> $name,
    'email' => $email,
    'password' => $password,
    'role_id' => $role_id,
    'agent_id' => $agent_id
]);
  
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
  
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
