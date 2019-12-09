@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
@php
$link_to_index=route('paprices.index', $product->id); 
@endphp
    
{!! Form::open([
    'route' => ['paprices.store',$product->id],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('paprices._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}  
        
        
@endsection