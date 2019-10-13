@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
        <div class="pull-left">
            <h2>Details</h2>
        </div>
    <div class="pull-right"><a href="{{ route('prices.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a></div>
    
    
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Agent</td>
                <td>{{ $price->agent->title }}</td>
                
            </tr>
            <tr>
                <td scope="row">Plan</td>
                <td>{{ $price->plan->title }}</td>
                
            </tr>
            <tr>
                    <td scope="row">Destination</td>
                    <td>{{ $price->destination->title }}</td>
                    
                </tr>
                <tr>
                        <td scope="row">Day range</td>
                        <td>{{ $price->day_range->title }}</td>
                        
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
        
        {!! Form::model($price, array('route' => array('prices.destroy', $price->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{route('prices.edit',$price->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection