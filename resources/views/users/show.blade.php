@extends('dashboard.master')
@section('title')
    Details
@endsection
@section('content')
<div class="container">
        
    <div class="pull-left"><h2>Details</h2></div>
    <div class="pull-right"><a href="{{ route('users.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Back to Index</a></div>
        
    
    
    
    
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