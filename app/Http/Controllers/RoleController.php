<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RoleFormRequest;

class RoleController extends Controller
{
    //
    public function Index()
    {
        //$this->authorize('view-role');
        # code...
        $model = Role::all();
        return view('roles.index')->with(['model'=>$model]);
    }
    public function Create()
    {
        # code...
        return view('roles.create');
    }
    public function Store(RoleFormRequest $request)
    {
        # code...
        // dd(Input::get('content'));
        $title = Input::get('title');        
        Role::create([
            'title'=> $title
        ]);
        $request->session()->flash('status', 'Create '.$title.' successful!');
        return redirect(route('roles.index'));
    }
    
    public function Details($id)
    {
        $this->authorize('view-role');
        # code...
        $model = Role::find($id);
        return view('roles.details')->with('model',$model);
    }
    public function Edit($id)
    {
        //$this->authorize('edit-role');
        # code...
        $model = Role::find($id);
        return view('roles.edit')->with('model',$model);
    }
    public function Update($id, RoleFormRequest $request)
    {
        # code...
        $model = Role::find($id);
        $title = Input::get('title');
        
        $model->update([
            'title'=> $title
            
        ]);
        $request->session()->flash('status', 'Update '.$title.' successful!');
        return redirect(route('roles.index'));
    }
}
