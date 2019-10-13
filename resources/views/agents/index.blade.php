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
    <div class="pull-right"><a class="btn btn-primary" href="{{route('agents.create')}} ">Create New</a></div>
    
    <table class="table">
        <thead>
            <tr>
                    <th>Agent Number</th>
                <th>Title</th>
                <th>Client Number</th>
                <th>Tax Number</th>
                <th>Email</th>
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                    <td>{{ $item->name}} </td>
                <td scope="row">{{ $item->title }}</td>
                <td>{{ $item->client_no}} </td>
                <td>{{ $item->taxnum}} </td>
                <td>{{ $item->email}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('agents.details', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection