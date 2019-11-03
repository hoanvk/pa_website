@extends('shared.master')
@section('title')
    Personal Accident
@endsection
@section('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">

@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('pa.quotation')
@endsection
@section('content')
{{-- <a href="{{ route('pa.index')}} " class="btn btn-link">
    <i class="fa fa-chevron-left"></i>@lang('pa.previous') </a> --}}
    {{-- @include('pa._status') --}}

{!! Form::open([
'route' => ['pa.store', $product->id],
'method' => 'POST'

]) !!}


@include('pa._form',[ 'button_name' => 'pa.create'])

{!! Form::close() !!}   

@endsection
