@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
@php
   $link_to_index=route('autonumbers.index'); 
@endphp
{!! Form::open([
    'route' => ['autonumbers.store'],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('autonumbers._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}  
        
        
@endsection