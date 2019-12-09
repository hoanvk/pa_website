@extends('dashboard.master')
@section('title')
Benefit
@endsection
@section('content')
@php
$link_to_index=route('benefits.index', $product->id); 
@endphp
                {!! Form::model($model, array('route' => array('benefits.update', $model->product_id, $model->id), 'method'=>'PUT')) !!}
                
                    @include('benefits._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection