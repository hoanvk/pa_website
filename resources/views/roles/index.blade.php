@extends('dashboard.master')
@section('title')
    Role
@endsection
@section('content')
<div class="text-right mb-2"><a class="btn btn-primary" href="{{route('roles.create')}} ">Create New</a></div>
    
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Id</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $item)
        <tr>
            <td scope="row">{{ $item->title }}</td>
            <td>{{ $item->id}} </td>
            <td><a href="{{  route('roles.show', $item->id) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>    
    
@endsection