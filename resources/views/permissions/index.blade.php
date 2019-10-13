@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
    @if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif
    <h2>Index</h2>
    <p>
        <a class="btn btn-primary" href="{{route('permissions.create')}} ">Create New</a>
    </p>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row"><a href="{{  route('permissions.details', $item->id) }} ">{{ $item->title }}</a></td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->id}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection