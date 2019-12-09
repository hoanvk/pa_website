@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
@php
   $link_to_index=route('dayranges.index'); 
@endphp 
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Title</td>
                <td>{{ $model->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">From</td>
                <td>{{ $model->day_from }}</td>
                
            </tr>
            <tr>
                    <td scope="row">To</td>
                    <td>{{ $model->day_to }}</td>
                    
                </tr>
            <tr>
                <td scope="row">Id</td>
                <td>{{ $model->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('dayranges.destroy', $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{ route('dayranges.edit', $model->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection