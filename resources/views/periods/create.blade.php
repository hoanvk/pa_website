@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')
@php
$link_to_index=route('periods.index', $product->id); 
@endphp
    {!! Form::open([
        'route' => ['periods.store',$product->id],
        'method' => 'POST'

    ]) !!}

        
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    {{-- <form action="{{ route('article.store') }}" method="POST">
            {{ csrf_field() }} --}}
        @include('periods._form',[ 'button_name' => 'Create'])
    {{-- </form> --}}
    {!! Form::close() !!}  
@endsection