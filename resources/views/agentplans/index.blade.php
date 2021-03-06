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
        <a class="btn btn-primary" href="{{route('agentplans.create')}} ">Create New</a>
    </div>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>Agent</th>
                <th>Plan</th>
                
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">
                    {{$item->agent->name }}</td>
                    <td>{{$item->plan->name }}</td>
                
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('agentplans.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection