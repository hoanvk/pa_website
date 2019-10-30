@extends('shared.master')
@section('title')
    Personal Accident | MSIG
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
    COVERAGE
@endsection
@section('content')
    <div class="clearfix">
        <span class="float-left"><a href="{{ route('pa.index', $product->id)}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Previous</a></span>
        
      </div>


{!! Form::open([
'route' => ['pa.store', $product->id],
'method' => 'POST'

]) !!}


@include('pa._form',[ 'button_name' => 'Create'])

{!! Form::close() !!}   

@endsection
