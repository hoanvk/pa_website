@extends('dashboard.master')
@section('title')
    Details
@endsection
@section('content')
@php
    $link_to_index = route('users.index');
@endphp
  
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Name</td>
                <td>{{ $model->name }}</td>
                
            </tr>
            <tr>
                <td scope="row">Email</td>
                <td>{{ $model->email }}</td>
                
            </tr>
            <tr>
                <td scope="row">Role</td>                
                <td>{{ optional($role->firstWhere('id', '==', $model->role_id))->title }}</td>
            </tr>
            <tr>
                    <td scope="row">Agent</td>                
                    <td>{{ optional($agent->firstWhere('id', '==', $model->agent_id))->title }}</td>
                </tr>
        </tbody>
    </table>   
    <p>
            {!! Form::model($model, array('route' => array('users.destroy', $model->id), 'method'=>'DELETE')) !!}
            
            <a class="btn btn-primary" href="{{route('users.edit',$model->id)}} ">Edit</a>
            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!} 
        
    </p>
                
@endsection