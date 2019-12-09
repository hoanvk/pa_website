@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')
@php
$link_to_index=route('periods.index', $product->id); 
@endphp
                {!! Form::model($model, array('route' => array('periods.update', $model->product->id, $model->id), 'method'=>'PUT')) !!}
                
                    @include('periods._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection