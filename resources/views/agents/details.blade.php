@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
    
    <div class="pull-left"><h2>Details</h2></div>
    
    <div class="pull-right"><a href="{{ route('agents.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a></div>
    <table class="table">
        <tbody>
                <tr>
                        <td scope="row">Agent Number</td>
                        <td>{{ $model->name }}</td>
                        
                    </tr>
            <tr>
                <td scope="row">Title</td>
                <td>{{ $model->title }}</td>
                
            </tr>
            <tr>
                    <td scope="row">Client Number</td>
                    <td>{{ $model->client_no }}</td>
                    
                </tr>
            <tr>
                <td scope="row">Tax Number</td>
                <td>{{ $model->taxnum }}</td>
                
            </tr>
            <tr>
                <td scope="row">Email</td>
                <td>{{ $model->email }}</td>
                
            </tr>
            <tr>
                <td scope="row">Address</td>
                <td>{{ $model->address }}</td>
                
            </tr>
            <tr>
                <td scope="row">Id</td>
                <td>{{ $model->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        <a class="btn btn-primary" href="{{route('agents.edit',['id'=>$model->id])}} ">Edit</a>
    </p>
@endsection