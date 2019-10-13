@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
        <div class="pull-left">
            <h2>Details</h2>
        </div>
    <div class="pull-right"><a href="{{ route('products.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a></div>
    
    
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Title</td>
                <td>{{ $product->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Name</td>
                <td>{{ $product->name }}</td>
                
            </tr>
            <tr>
                <td scope="row">Id</td>
                <td>{{ $product->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($product, array('route' => array('products.destroy', $product->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{route('products.edit',$product->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection