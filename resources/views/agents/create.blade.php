@extends('dashboard.master')
@section('title')
    Create Agent
@endsection
@section('content')
@php
    $link_to_index = route('agents.index');
@endphp
{!! Form::open([
    'route' => ['agents.store'],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('agents._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}   
@endsection