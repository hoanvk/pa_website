<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

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
        $items = Item::latest()->paginate(10);
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'item_item' => 'required|max:5',
            'item_tabl' => 'required|max:5',
            'short_desc' => 'required|max:50', 
            'long_desc' => 'required|max:250'
        ]);
  
        Item::create($request->all());
   
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
    public function update(Request $request, Item $item)
    {
        //
        $request->validate([
            'item_item' => 'required|max:5',
            'item_tabl' => 'required|max:5',
            'short_desc' => 'required|max:50', 
            'long_desc' => 'required|max:250'
        ]);
  
        $item->update($request->all());
  
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
