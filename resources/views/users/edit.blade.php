@extends('dashboard.master')
@section('title')
Edit
@endsection
@section('content')
@php
    $link_to_index=route('users.index');
@endphp
{!! Form::model($model, ['route' => ['users.update',$model->id], 'method'=>'PUT']) !!}

    @include('users._form',['button_name' => 'Edit'])

{!! Form::close() !!} 

@endsection