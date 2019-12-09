@extends('dashboard.master')
@section('title')
Benefit
@endsection
@section('content')
@php
$link_to_index=route('benefits.index', $model->product_id); 
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
            
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('benefits.destroy',$model->product_id, $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-outline-primary" href="{{route('benefits.edit',['product_id'=> $model->product_id, 'id'=>$model->id])}} ">Edit Benefit</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!} 
    </p>
@endsection