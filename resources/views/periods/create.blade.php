@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'periods.index', 'title'=>'Index','parameter'=>$product->id], ['title'=>'Create']]])
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