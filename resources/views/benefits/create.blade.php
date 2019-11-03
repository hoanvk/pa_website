@extends('dashboard.master')
@section('title')
Benefit
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'benefits.index', 'title'=>$product->title,'parameter'=> $product->id], 
    ['title'=>'Create']]])
    {!! Form::open([
        'route' => ['benefits.store',$product->id],
        'method' => 'POST'

    ]) !!}

        
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    {{-- <form action="{{ route('article.store') }}" method="POST">
            {{ csrf_field() }} --}}
        @include('benefits._form',[ 'button_name' => 'Create'])
    {{-- </form> --}}
    {!! Form::close() !!}  
@endsection