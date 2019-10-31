@extends('shared.master')
@section('title')
Personal Accident | MSIG
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
    CUSTOMER
@endsection
@section('content')
<div class="clearfix">
    <span class="float-left"><a href="{{ route('pa.index', $product->id)}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Previous</a></span>
    <span class="float-right"><a href="{{ route('pa.show', $product->id, $model->id)}} " class="btn btn-link">Next <i class="fa fa-chevron-right"></i></a></span>
</div>
            
            {!! Form::model($model, array('route' => array('pa.update',$product->id, $model->id), 'method'=>'PUT')) !!}
            
                @include('pa._form',[ 'button_name' => 'Update'])
            
            {!! Form::close() !!}    
        
   
  
@endsection
