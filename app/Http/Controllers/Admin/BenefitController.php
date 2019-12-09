<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Master\Benefit;
use App\Models\Master\Product;
use Illuminate\Support\Facades\Input;

class BenefitController extends ProductPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        //
        
        $model = Benefit::where('product_id','=',$product_id)->latest()->paginate(10);
        return view('benefits.index')->with(['i'=> (request()->input('page', 1) - 1) * 10,
            'model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        //
        
        return view('benefits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        //
        $name = Input::get('name');
        $title = Input::get('title');
        
        $model = Benefit::create(['name'=>$name,'title'=>$title, 'product_id'=>$product_id]);
        $locale = App::getLocale();
        $model
            ->setTranslation('title', $locale, $title)
            
            ->save();
        return redirect()->route('benefits.index',$product_id)
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
        $model =Benefit::find($id);
       
        return view('benefits.show')->with(['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $id)
    {
        //
        $model =Benefit::find($id);
        
        return view('benefits.edit')->with(['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $id)
    {
        //
        $model =Benefit::find($id);
        
        $title = Input::get('title');
        $name = Input::get('name');
        $model->update(['name'=>$name,'product_id'=>$product_id]);
        
        $locale = App::getLocale();
        $model->setTranslation('title', $locale, $title)            
            ->save();
        return redirect()->route('benefits.index',$product_id)
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
        $model =Benefit::find($id);
        $model->delete();
  
        return redirect()->route('benefits.index')
                        ->with('success','Benefit deleted successfully');
    }
}
