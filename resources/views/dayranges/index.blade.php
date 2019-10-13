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
        <a class="btn btn-primary" href="{{route('dayranges.create')}} ">Create New</a>
    </div>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>From</th>
                <th>To</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dayRanges as $item)
            <tr>
                <td scope="row"><a href="{{  route('dayranges.show', $item->id) }} ">{{ $item->title }}</a></td>
                <td>{{ $item->day_from}} </td>
                <td>{{ $item->day_to}} </td>
                <td>{{ $item->id}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $dayRanges->links() !!}
@endsection