@extends('dashboard.master')
@section('title')
    Benefit
@endsection
@section('content')
<div class="clearfix mb-2">
    <span class="float-left"><a class="btn btn-outline-primary" href="{{route('products.show', $product->id)}} ">Back</a></span>
    <span class="float-right"><a class="btn btn-primary" href="{{route('benefits.create', $product->id)}} ">Create New</a></span>
  </div>
    
    <table class="table">
        <thead>
            <tr>
                {{-- <th>Title</th> --}}
                <th>Name</th>
                <th>Title</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                {{-- <td scope="row">{{ $item->title }}</td> --}}
                <td>{{ $item->name}} </td>
                <td>{{ $item->title}} </td>
                
                <td><a href="{{  route('benefits.show', ['product_id'=>$item->product_id, 'id'=>$item->id]) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection