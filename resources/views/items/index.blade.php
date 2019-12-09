@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="text-right mb-2"><a class="btn btn-primary" href="{{route('items.create')}} ">Create New</a></div>
    
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
                <td><a href="{{  route('items.show', $item->id) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $items->links() !!}
@endsection