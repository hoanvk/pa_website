@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
@php
$link_to_index=route('paprices.index', $product->id); 
@endphp

     
    
{!! Form::model($model, array('route' => array('paprices.update', $model->product_id, $model->id), 'method'=>'PUT')) !!}

    @include('paprices._form',[ 'button_name' => 'Update'])

{!! Form::close() !!}   
@endsection