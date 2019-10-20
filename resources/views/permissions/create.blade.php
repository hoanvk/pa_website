@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'permissions.index', 'title'=>'Index'], ['title'=>'Create']]])
    {!! Form::open([
        'route' => ['permissions.store'],
        'method' => 'POST'

    ]) !!}

        
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    {{-- <form action="{{ route('article.store') }}" method="POST">
            {{ csrf_field() }} --}}
        @include('permissions._form',[ 'button_name' => 'Create'])
    {{-- </form> --}}
    {!! Form::close() !!}  
@endsection