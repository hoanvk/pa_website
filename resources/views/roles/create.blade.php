@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
{!! Form::open([
    'route' => ['roles.store'],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('roles._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}  
@php
    $link_to_index =route('roles.index');
@endphp

@endsection