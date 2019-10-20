@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
        
    @include('dashboard._formheader',['title'=>'Index','action'=>'permissions.create', 'button'=>'Create New'])
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->title }}</td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('permissions.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection