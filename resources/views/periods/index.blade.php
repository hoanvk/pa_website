@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')
<div class="clearfix mb-2">
    <span class="float-left"><a class="btn btn-outline-primary" href="{{route('products.show', $product->id)}} ">Back</a></span>
    <span class="float-right"><a class="btn btn-primary" href="{{route('periods.create', $product->id)}} ">Create New</a></span>
  </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->title }}</td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->product->title}} </td>
                <td>{{ $item->qty}} </td>
                <td>{{ $item->unit}} </td>
                <td><a href="{{  route('periods.show', ['product_id'=> $product->id, 'id'=> $item->id]) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
     {!! $model->links() !!}
   
@endsection