@extends('dashboard.master')
@section('title')
    Destination
@endsection
@section('content')
<div class="clearfix mb-2">
    
    <span class="float-right"><a class="btn btn-primary" href="{{route('destinations.create')}} ">Create New</a></span>
  </div>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinations as $item)
            <tr>
                <td scope="row"><a href="{{  route('destinations.show', $item->id) }} ">{{ $item->title }}</a></td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->id}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $destinations->links() !!}
@endsection