<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Master\Period;
use App\Models\Master\Product;
use App\Http\Requests\PeriodRequest;
use Illuminate\Support\Facades\Input;
use App\Repositories\Common\ISelectList;

class PeriodController extends ProductPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        //
        $product = Product::find($product_id);
        $model = Period::where('product_id','=',$product_id)->latest()->paginate(15);
        return view('periods.index')->with(['i'=> (request()->input('page', 1) - 1) * 15,
            'model'=>$model, 'product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id,ISelectList $selectList)
    {
        //
        $product = Product::find($product_id);
        $units = $selectList->periodUnit()->pluck('long_desc', 'item_item');
        return view('periods.create')->with(['product'=>$product,'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodRequest $request, $product_id)
    {
        //
        $title = Input::get('title');
        $name = Input::get('name');
        
        $qty = Input::get('qty');
        $unit = Input::get('unit');
        Period::create(['title'=>$title,
            'name'=>$name,
            'product_id'=>$product_id,
            'qty'=>$qty,
            'unit'=>$unit]);
   
        return redirect()->route('periods.index',$product_id)
                        ->with('success','Benefit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id, $id)
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
    public function edit($product_id, $id, ISelectList $selectList)
    {
        //
        $model =Period::find($id);
    
        $units = $selectList->periodUnit()->pluck('long_desc', 'item_item');
        return view('periods.edit',compact('model'))->with(['model'=>$model, 'units'=>$units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodRequest $request, $product_id, $id)
    {
        //
        $model =Period::find($id);

        $title = Input::get('title');
        $name = Input::get('name');
        
        $qty = Input::get('qty');
        $unit = Input::get('unit');
        
        $model->update(['title'=>$title,
        'name'=>$name,
        'product_id'=>$product_id,
        'qty'=>$qty,
        'unit'=>$unit]);
  
        return redirect()->route('periods.index',$product_id)
                        ->with('success','Benefit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id)
    {
        //
        $model =Period::find($id);
        $model->delete();
  
        return redirect()->route('periods.index',$product_id)
                        ->with('success','Benefit deleted successfully');
    }
}
