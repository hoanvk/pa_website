@extends('dashboard.master')
@section('title')
    User List
@endsection
@section('content')
<div class="container">
    
    @if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif
    <div class="pull-left"><h2>Index</h2></div>
    <div class="pull-right"><a class="btn btn-primary" href="{{route('users.create')}} ">Create New</a></div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
               
                <th>Role</th>
                <th>Agent</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                
                <td>{{ optional($role->firstWhere('id', '==', $item->role_id))->title }}</td>
                <td>{{ optional($agent->firstWhere('id', '==', $item->agent_id))->title }}</td>
                <td><a href="{{  route('users.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                {{-- <td>{{ $item->role_id}} </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection