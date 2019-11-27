@php
    $link_to_index=route('users.index');
@endphp
@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
{!! Form::open([
    'route' => ['users.store'],
    'method' => 'POST'

]) !!}

@include('users._form',[ 'button_name' => 'Create'])
{!! Form::close() !!} 

@endsection