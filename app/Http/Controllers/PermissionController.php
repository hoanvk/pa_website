<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PermissionFormRequest;

class PermissionController extends Controller
{
    //
    public function Index()
    {
        # code...
        $model = Permission::all();
        return view('permissions.index', compact('model'));
    }
    public function Create()
    {
        # code...
        return view('permissions.create');
    }
    public function Store(PermissionFormRequest $request)
    {
        # code...
        // dd(Input::get('content'));
        $title = Input::get('title');        
        $name = Input::get('name');  
        Permission::create([
            'title'=> $title,
            'name'=> $name
        ]);
        $request->session()->flash('status', 'Create '.$title.' successful!');
        return redirect(route('permissions.index'));
    }
    
    public function Details($id)
    {
        # code...
        $model = Permission::find($id);
        return view('permissions.details')->with('model',$model);
    }
    public function Edit($id)
    {
        # code...
        $model = Permission::find($id);
        return view('permissions.edit')->with('model',$model);
    }
    public function Update($id, RoleFormRequest $request)
    {
        # code...
        $model = Permission::find($id);
        $title = Input::get('title');
        $name = Input::get('name');
        $model->update([
            'title'=> $title,
            'name'=> $name
        ]);
        $request->session()->flash('status', 'Update '.$title.' successful!');
        return redirect(route('permissions.index'));
    }
}
