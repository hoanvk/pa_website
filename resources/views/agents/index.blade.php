@extends('dashboard.master')
@section('title')
    Agent
@endsection
@section('content')
<div class="text-right mb-2"><a class="btn btn-primary" href="{{route('agents.create')}} ">Create New</a></div>
 
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
                <td><a href="{{  route('agents.show', $item->id) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection