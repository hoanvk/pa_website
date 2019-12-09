@extends('dashboard.master')
@section('title')
    PA Price
@endsection
@section('content')

@php
$link_to_index=route('paprices.index', $product->id); 
@endphp
   
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Product</td>
                <td>{{ $model->product->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Plan</td>
                <td>{{ $model->plan->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Coverage</td>
                <td>{{ $model->period->title }}</td>
                
            </tr>
               
            <tr>
                <td scope="row">Price</td>
                <td>{{ $model->amount }}</td>
                
            </tr>        
            <tr>
                <td scope="row">Id</td>
                <td>{{ $model->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('paprices.destroy', $model->product_id, $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-outline-primary" href="{{route('paprices.edit',['product_id'=>$model->product_id,'id'=>$model->id])}} ">Edit Price</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection