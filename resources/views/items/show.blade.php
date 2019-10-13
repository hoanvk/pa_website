@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
    <h2>Details</h2>
    
    
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Item Code</td>
                <td>{{ $item->item_item }}</td>
                
            </tr>
            <tr>
                <td scope="row">Table</td>
                <td>{{ $item->item_tabl }}</td>
                
            </tr>
            <tr>
                <td scope="row">Short Desc</td>                
                <td>{{ $item->short_desc }}</td>
            </tr>
            <tr>
                <td scope="row">Long Desc</td>                
                <td>{{ $item->long_desc }}</td>
            </tr>
        </tbody>
    </table>   
    <p>
            {!! Form::model($item, array('route' => array('items.destroy', $item->id), 'method'=>'DELETE')) !!}
        
            <a class="btn btn-primary" href="{{route('items.edit',$item->id)}} ">Edit Item</a>
            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!} 
        
    </p>
@endsection