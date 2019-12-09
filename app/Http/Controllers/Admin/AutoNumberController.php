<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;
use App\Models\Master\Product;
use App\Models\Master\AutoNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutoNumberRequest;

class AutoNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $model = AutoNumber::latest()->paginate(5);
        return view('autonumbers.index')->with(['i'=> (request()->input('page', 1) - 1) * 5,
            'model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::pluck('title', 'id');
        return view('autonumbers.create')->with(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutoNumberRequest $request)
    {
        //
        
        AutoNumber::create($request->all());
   
        return redirect()->route('autonumbers.index')
                        ->with('success','Auto Number created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AutoNumber  $autoNumber
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $model =AutoNumber::find($id);
        return view('autonumbers.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AutoNumber  $autoNumber
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model =AutoNumber::find($id);
        $products = Product::pluck('title', 'id');
        return view('autonumbers.edit',compact('model'))->with(['model'=>$model, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AutoNumber  $autoNumber
     * @return \Illuminate\Http\Response
     */
    public function update(AutoNumberRequest $request, $id)
    {
        //
        $model =AutoNumber::find($id);
        $model->update($request->all());
  
        return redirect()->route('autonumbers.index')
                        ->with('success','Auto Number updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AutoNumber  $autoNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model =AutoNumber::find($id);
        $model->delete();
  
        return redirect()->route('autonumbers.index')
                        ->with('success','Auto Number deleted successfully');
    }
}
