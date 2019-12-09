@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
@php
   $link_to_index=route('products.index'); 
@endphp
{!! Form::model($product, array('route' => array('products.update', $product->id), 'method'=>'PUT')) !!}
{{-- {!! Form::open([
    'route' => ['item.update',$model->id],
    'method' => 'PUT'

]) !!} --}}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('products._form',[ 'button_name' => 'Update'])
{{-- </form> --}}
{!! Form::close() !!}   
@endsection