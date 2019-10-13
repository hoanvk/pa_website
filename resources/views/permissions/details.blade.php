@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    <a href="{{ route('permissions.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a>
    <h2>Details</h2>
    
    
    
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
                <td scope="row">Id</td>
                <td>{{ $model->id }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        <a class="btn btn-primary" href="{{route('permissions.edit',['id'=>$model->id])}} ">Edit Role</a>
    </p>
@endsection