<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Product;
use App\SelectList;
use App\Http\Requests\PeriodRequest;
use Illuminate\Support\Facades\Input;
class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Period::latest()->paginate(15);
        return view('periods.index')->with(['i'=> (request()->input('page', 1) - 1) * 15,
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
        $units = SelectList::periodUnit()->pluck('long_desc', 'item_item');
        return view('periods.create')->with(['products'=>$products,'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodRequest $request)
    {
        //
        $title = Input::get('title');
        $name = Input::get('name');
        $product_id = Input::get('product_id');
        $qty = Input::get('qty');
        $unit = Input::get('unit');
        Period::create(['title'=>$title,
            'name'=>$name,
            'product_id'=>$product_id,
            'qty'=>$qty,
            'unit'=>$unit]);
   
        return redirect()->route('periods.index')
                        ->with('success','Benefit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $model =Period::find($id);
        return view('periods.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model =Period::find($id);
        $products = Product::pluck('title', 'id');
        $units = SelectList::periodUnit()->pluck('long_desc', 'item_item');
        return view('periods.edit',compact('model'))->with(['model'=>$model, 'products'=>$products,'units'=>$units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodRequest $request, $id)
    {
        //
        $model =Period::find($id);

        $title = Input::get('title');
        $name = Input::get('name');
        $product_id = Input::get('product_id');
        $qty = Input::get('qty');
        $unit = Input::get('unit');
        
        $model->update(['title'=>$title,
        'name'=>$name,
        'product_id'=>$product_id,
        'qty'=>$qty,
        'unit'=>$unit]);
  
        return redirect()->route('periods.index')
                        ->with('success','Benefit updated successfully');
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
        $model =Period::find($id);
        $model->delete();
  
        return redirect()->route('periods.index')
                        ->with('success','Benefit deleted successfully');
    }
}
