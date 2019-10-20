@extends('dashboard.master')
@section('title')
Period | MSIG
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'periods.index', 'title'=>'Index'], ['title'=>'Create']]])
    {!! Form::open([
        'route' => ['periods.store'],
        'method' => 'POST'

    ]) !!}

        
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    {{-- <form action="{{ route('article.store') }}" method="POST">
            {{ csrf_field() }} --}}
        @include('periods._form',[ 'button_name' => 'Create'])
    {{-- </form> --}}
    {!! Form::close() !!}  
@endsection