@extends('dashboard.master')
@section('title')
    Product
@endsection
@section('content')
<div class="clearfix mb-2">
    
        <span class="float-right"><a class="btn btn-primary" href="{{route('products.create')}} ">Create New</a></span>
      </div>
    
    {{$start_date}} {{$end_date}}
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Product Type</th>
                <th>Agent (default)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td scope="row">{{ $item->title }}</td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->product_type}} </td>
                <td>{{ optional($item->agent)->title}} </td>
                <td><a href="{{  route('products.show', $item->id) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $products->links() !!}
@endsection