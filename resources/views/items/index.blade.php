@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
    @if (session('success'))
        <div class="alert alert-info">{{session('success')}}</div>
    @endif
    <div class="pull-left"><h2>Index</h2></div>
    <div class="pull-right"><a class="btn btn-primary" href="{{route('items.create')}} ">Create New</a></div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Table</th>
                <th>Item</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td scope="row">{{ $item->item_tabl }}</td>
                <td>{{ $item->item_item }}</td>
                <td>{{ $item->short_desc }}</td>
                <td><a href="{{  route('items.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $items->links() !!}
@endsection