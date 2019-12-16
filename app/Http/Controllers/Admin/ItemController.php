<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Requests\ItemFormRequest;
use App\Models\Master\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::orderBy('item_tabl')->paginate(10);
        return view('items.index', compact('items'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemFormRequest $request)
    {
        //
     
        $item_tabl = Input::get('item_tabl');
        $item_item = Input::get('item_item');
        $short_desc = Input::get('short_desc');
        $long_desc = Input::get('long_desc');

        $model = Item::create(['item_tabl'=>$item_tabl,
        'item_item'=>$item_item,
        'short_desc'=>$short_desc,
        'long_desc'=>$long_desc]);
        $locale = App::getLocale();
        $model
            ->setTranslation('long_desc', $locale, $long_desc)
            
            ->save();
        return redirect()->route('items.index')
                        ->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(ItemFormRequest $request, $id)
    {
        //
        
        $model =Item::find($id);
        $item_item = Input::get('item_item');
        $short_desc = Input::get('short_desc');
        $long_desc = Input::get('long_desc');

        $model->update(['item_item'=>$item_item,
        'short_desc'=>$short_desc]);
        
        $locale = App::getLocale();
        $model
            ->setTranslation('long_desc', $locale, $long_desc)
            
            ->save();
        
  
        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
  
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');
    }
}
