@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
    @if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif
    <div class="pull-left"><h2>Index</h2></div>
    <div class="pull-right"><a class="btn btn-primary" href="{{route('roles.create')}} ">Create New</a></div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row"><a href="{{  route('roles.details', $item->id) }} ">{{ $item->title }}</a></td>
                <td>{{ $item->id}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection