@extends('dashboard.master')
@section('title')
    Product
@endsection
@section('content')
@php
   $link_to_index=route('products.index'); 
@endphp
<ul class="nav nav-tabs">
    
        <li class="nav-item">
          <a class="nav-link active" href="#">Product</a>
          
        </li>
        <li class="nav-item">
                <a class="nav-link" href="{{route('paprices.index',$product->id)}} ">PA Price</a>
                
              </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('benefits.index',$product->id)}} ">Benefits</a>
          
        </li>
        <li class="nav-item">
                <a class="nav-link" href="{{route('periods.index',$product->id)}} ">Periods</a>
          
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> --}}
      </ul>
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Title</td>
                <td>{{ $product->title }}</td>
                
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $product->name }}</td>
                
            </tr>
            <tr>
                <td>Product Type</td>
                <td>{{ $product->product_type }}</td>
                
            </tr>
            <tr>
                <td>Agent (default)</td>
                <td>{{ optional($product->agent)->title }}</td>
                
            </tr>
        </tbody>
    </table>   
    <div mt-2>
        
        {!! Form::model($product, array('route' => array('products.destroy', $product->id), 'method'=>'DELETE')) !!}
        
        
        <a class="btn btn-outline-primary" href="{{route('products.edit',$product->id)}} ">Edit Product</a>
        <button type="submit" class="btn btn-danger">Delete</button>
        
        {{-- <a class="btn btn-outline-danger" href="{{route('paprices.index',$product->id)}} ">PA Price</a>
        <a class="btn btn-outline-primary" href="{{route('benefits.index',$product->id)}} ">Benefits</a>
        <a class="btn btn-outline-primary" href="{{route('periods.index',$product->id)}} ">Periods</a> --}}
        {!! Form::close() !!} 
    </div>
@endsection