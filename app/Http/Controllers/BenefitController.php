<?php

namespace App\Http\Controllers;
use App\Benefit;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App;
class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Benefit::latest()->paginate(10);
        return view('benefits.index')->with(['i'=> (request()->input('page', 1) - 1) * 10,
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
        return view('benefits.create')->with(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $model = Benefit::create($request->all());
        $title = Input::get('title');
        $locale = App::getLocale();
        $model
            ->setTranslation('title', $locale, $title)
            
            ->save();
        return redirect()->route('benefits.index')
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
        $model =Benefit::find($id);
        return view('benefits.show',compact('model'));
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
        $model =Benefit::find($id);
        $products = Product::pluck('title', 'id');
        return view('benefits.edit',compact('model'))->with(['model'=>$model, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $model =Benefit::find($id);
        $description = Input::get('description');
        $title = Input::get('title');
        $name = Input::get('name');
        $model->update(['name'=>$name]);
        
        $locale = App::getLocale();
        $model->setTranslation('title', $locale, $title)
            ->setTranslation('description', $locale, $description)
            ->save();
        return redirect()->route('benefits.index')
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
        $model =Benefit::find($id);
        $model->delete();
  
        return redirect()->route('benefits.index')
                        ->with('success','Benefit deleted successfully');
    }
}
