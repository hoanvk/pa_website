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
        <a class="btn btn-primary" href="{{route('cashes.create')}} ">Create New</a>
    </div>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>Agent</th>
                <th>Limit</th>
                <th>Outstanding</th>
                
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ optional($agent->firstWhere('id', '==', $item->agent_id))->name }}</td>
                    
                <td>{{ $item->limit_bal}} </td>
                <td>{{ $item->os_bal}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('cashes.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection