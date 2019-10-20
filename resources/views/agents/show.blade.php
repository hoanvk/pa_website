@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'agents.index', 'title'=>'Index'], 
        ['title'=>'Details']]])
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>Success!</strong>
        <p>{{ $message }}</p>
    </div>
@endif
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
        
        {!! Form::model($model, array('route' => array('agents.destroy', $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-outline-primary" href="{{route('agents.edit',['id'=>$model->id])}} ">Edit Agent</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
    
    
@endsection