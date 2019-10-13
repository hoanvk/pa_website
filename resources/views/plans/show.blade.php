@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
        <div class="pull-left">
            <h2>Details</h2>
        </div>
    <div class="pull-right"><a href="{{ route('plans.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a></div>
    
    
    
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
            
            <tr>
                <td scope="row">Id</td>
                <td>{{ $model->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('plans.destroy', $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{route('plans.edit',$model->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection