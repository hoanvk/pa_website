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
            <a class="btn btn-outline-primary" href="{{route('prices.export')}} ">Export</a>
            <a class="btn btn-outline-primary" href="{{route('prices.import')}} ">Import</a>
        <a class="btn btn-primary" href="{{route('prices.create')}} ">Create New</a>
    </div>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>Agent</th>
                <th>Plan</th>
                <th>Destination</th>
                <th>Day range</th>
                <th>Price</th>
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $item)
            <tr>
                <td scope="row">
                    {{$item->agent->name }}</td>
                    <td>{{$item->plan->name }}</td>
                <td>{{ $item->destination->name }}
                    </td>
                    <td>{{ $item->day_range->title }}
                        </td>
                <td>{{ $item->amount}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('prices.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $prices->links() !!}
@endsection