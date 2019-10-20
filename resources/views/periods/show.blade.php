@extends('dashboard.master')
@section('title')
Period | MSIG
@endsection
@section('content')
<div class="container">
    @include('dashboard._breadcrumb',['nodes' =>[['action'=>'periods.index', 'title'=>'Index'], 
    
        ['title'=>'Details']]])
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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
        
        {!! Form::model($model, array('route' => array('periods.destroy', $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-outline-primary" href="{{route('periods.edit',['id'=>$model->id])}} ">Edit Period</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection