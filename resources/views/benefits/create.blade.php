@extends('dashboard.master')
@section('title')
Benefit | MSIG
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'benefits.index', 'title'=>'Index'], ['title'=>'Create']]])
    {!! Form::open([
        'route' => ['benefits.store'],
        'method' => 'POST'

    ]) !!}

        
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    {{-- <form action="{{ route('article.store') }}" method="POST">
            {{ csrf_field() }} --}}
        @include('benefits._form',[ 'button_name' => 'Create'])
    {{-- </form> --}}
    {!! Form::close() !!}  
@endsection