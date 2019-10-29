@extends('dashboard.master')
@section('title')
    PA Price
@endsection
@section('content')
<div class="container">
    
        <div class="pull-left">
            <h2>Details</h2>
        </div>
    <div class="pull-right"><a href="{{ route('paprices.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a></div>
    
    
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Product</td>
                <td>{{ $price->product->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Plan</td>
                <td>{{ $price->plan->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Coverage</td>
                <td>{{ $price->period->title }}</td>
                
            </tr>
               
            <tr>
                <td scope="row">Price</td>
                <td>{{ $price->amount }}</td>
                
            </tr>        
            <tr>
                <td scope="row">Id</td>
                <td>{{ $price->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($price, array('route' => array('paprices.destroy', ['product_id'=>$product_id,'id'=>$price->id]), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-outline-primary" href="{{route('paprices.edit',['product_id'=>$product_id,'id'=>$price->id])}} ">Edit Price</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection