@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="pull-left">
    <h2>Index</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{route('autonumbers.create')}} ">Create New</a>
    </div>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Last Number</th>
                <th>Start Number</th>
                <th>End Number</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->product->title }}</td>
                <td>{{ $item->last_number}} </td>
                <td>{{ $item->start_number}} </td>
                <td>{{ $item->end_number}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('autonumbers.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection