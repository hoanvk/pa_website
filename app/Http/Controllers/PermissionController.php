<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PermissionFormRequest;

class PermissionController extends AdminPageController
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
        $permission = Permission::create([
            'title'=> $title,
            'name'=> $name
        ]);
        
        return redirect(route('permissions.show', $permission->id))
        ->with('success','Created '.$title.' successful!');
    }
    
    public function show($id)
    {
        # code...
        $model = Permission::find($id);
        return view('permissions.show')->with('model',$model);
    }
    public function Edit($id)
    {
        # code...
        $model = Permission::find($id);
        return view('permissions.edit')->with('model',$model);
    }
    public function Update($id, PermissionFormRequest $request)
    {
        # code...
        $model = Permission::find($id);
        $title = Input::get('title');
        $name = Input::get('name');
        $model->update([
            'title'=> $title,
            'name'=> $name
        ]);
        
        return redirect(route('permissions.show', $id))
        ->with('success','Updated '.$title.' successful!');
    }
    public function destroy($id)
    {
        //
        $product = Permission::find($id); 
        $product->delete();
  
        return redirect()->route('permissions.index')
                        ->with('success','Product deleted successfully');
    }
}
