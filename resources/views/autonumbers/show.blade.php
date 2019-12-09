@extends('dashboard.master')
@section('title')
Product Number
@endsection
@section('content')
@php
   $link_to_index=route('autonumbers.index'); 
@endphp
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Product</td>
                <td>{{ $model->product->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Start Number</td>
                <td>{{ $model->start_number }}</td>
                
            </tr>
            <tr>
                <td scope="row">End Number</td>
                <td>{{ $model->end_number }}</td>
                
            </tr>
            <tr>
                <td scope="row">Last Number</td>
                <td>{{ $model->last_number }}</td>
                
            </tr>
            <tr>
                <td scope="row">Id</td>
                <td>{{ $model->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('autonumbers.destroy', $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{route('autonumbers.edit',$model->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection