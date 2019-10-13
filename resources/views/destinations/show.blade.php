@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
        <div class="pull-left">
            <h2>Details</h2>
        </div>
    <div class="pull-right"><a href="{{ route('destinations.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a></div>
    
    
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Title</td>
                <td>{{ $destination->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Name</td>
                <td>{{ $destination->name }}</td>
                
            </tr>
            <tr>
                <td scope="row">Id</td>
                <td>{{ $destination->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($destination, array('route' => array('destinations.destroy', $destination->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{route('destinations.edit',$destination->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection