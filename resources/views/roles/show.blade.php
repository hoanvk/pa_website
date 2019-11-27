@extends('dashboard.master')
@section('title')
    Details
@endsection
@section('content')
@php
   $link_to_index=route('roles.index'); 
@endphp
<table class="table">
    <tbody>
    
        <tr>
            <td scope="row">Title</td>
            <td>{{ $model->title }}</td>
            
        </tr>
        <tr>
            <td scope="row">Id</td>
            <td>{{ $model->id }}</td>
            
        </tr>
    </tbody>
</table>   
<p>
    
    {!! Form::model($model, array('route' => array('roles.destroy', $model->id), 'method'=>'DELETE')) !!}
    
    <a class="btn btn-outline-primary" href="{{route('roles.edit',['id'=>$model->id])}} ">Edit</a>
    <button type="submit" class="btn btn-danger">Delete</button>
    {!! Form::close() !!} 
</p>
    
@endsection