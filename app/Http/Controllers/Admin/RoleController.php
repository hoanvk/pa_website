<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Validation\ValidationException;
use App\Repositories\User\UserInterface as UserInterface;

class RoleController extends Controller
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }
    //
    public function index()
    {
        //$this->authorize('view-role');
        # code...
        $model = Role::all();
        return view('roles.index')->with(['model'=>$model]);
    }
    public function create()
    {
        # code...
        return view('roles.create');
    }
    public function store(RoleFormRequest $request)
    {
        # code...
        // dd(Input::get('content'));
        $title = Input::get('title');   
        if ($this->user->getLength($title)>10) {
            $error = ValidationException::withMessages([
                'title' => ['Title must be less than 10 characters!']
             ]);
             throw $error;
            
        }     
        $role = Role::create([
            'title'=> $title
        ]);
        
        return redirect(route('roles.show', $role->id))
        ->with('success','Created '.$title.' successful!');
    }
    
    public function show($id)
    {
        
        # code...
        $model = Role::find($id);
        return view('roles.show')->with('model',$model);
    }
    public function edit($id)
    {
        //$this->authorize('edit-role');
        # code...
        $model = Role::find($id);
        return view('roles.edit')->with('model',$model);
    }
    public function update($id, RoleFormRequest $request)
    {
        # code...
        $model = Role::find($id);
        $title = Input::get('title');
        
        $model->update([
            'title'=> $title
            
        ]);
       
        return redirect(route('roles.show', $id))
            ->with('success','Updated '.$title.' successful!');
    }
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        $role->delete();
  
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
