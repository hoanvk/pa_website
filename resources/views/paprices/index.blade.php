@extends('dashboard.master')
@section('title')
    PA Price
@endsection
@section('content')
<div class="clearfix mb-2">
    <span class="float-left"><a class="btn btn-outline-primary" href="{{route('products.show', $product->id)}} ">Back</a></span>
    <span class="float-right"><a class="btn btn-primary" href="{{route('benefits.create', $product->id)}} ">Create New</a></span>
  </div>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Plan</th>
                <th>Coverage</th>
                
                <th>Price</th>
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{$item->product->title }}</td>
                <td>{{$item->plan->title }}</td>
                <td>{{ $item->period->name }}</td>
                    
                <td>{{ $item->amount}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('paprices.show', ['product_id'=>$product_id,'id'=>$item->id]) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection