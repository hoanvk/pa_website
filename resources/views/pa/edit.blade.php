@extends('shared.master')
@section('title')
Personal Accident
@endsection
@section('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">

{{-- <link rel="stylesheet" href="/css/themes/smoothness/jquery-ui.theme.css"> --}}
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    QUOTATION
@endsection
@section('content')
@include('pa._tabs')
            
            {!! Form::model($model, array('route' => array('pa.update',$product->id, $model->id), 'method'=>'PUT')) !!}
            
                @include('pa._form',[ 'button_name' => 'Update'])
            
            {!! Form::close() !!}    
        
   
  
@endsection
