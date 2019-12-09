@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')
@php
$link_to_index=route('periods.index', $model->product_id); 
@endphp
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Title</td>
                <td>{{ $model->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Name</td>
                <td>{{ $model->name }}</td>
                
            </tr>
            <tr>
                <td scope="row">Product</td>
                <td>{{ $model->product->title }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('periods.destroy', $model->product->id, $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-outline-primary" href="{{route('periods.edit',['product_id'=>$model->product->id, 'id'=>$model->id])}} ">Edit Period</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection