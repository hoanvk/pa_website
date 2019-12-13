@extends('shared.master')
@section('title')
Personal Accident
@endsection

@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    QUOTATION
@endsection
@section('content')
{{-- @include('pa._status') --}}

            
            {!! Form::model($model, array('route' => array('pa.update',$product->id, $model->id), 'method'=>'PUT')) !!}
            
                @include('pa._form',[ 'button_name' => 'Update'])
                 
            {!! Form::close() !!}    
        
   
            
@endsection
