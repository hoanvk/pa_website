@extends('dashboard.master')
@section('title')
    PA Price
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
            
        <a class="btn btn-primary" href="{{route('paprices.create', $product_id)}} ">Create New</a>
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
                <td><a href="{{  route('paprices.show', ['product_id'=>$product_id,'id'=>$item->id]) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection