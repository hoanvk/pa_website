@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')

    {!! Form::model($item, array('route' => array('items.update', $item->id), 'method'=>'PUT')) !!}                        
    @include('items._form',[ 'button_name' => 'Update'])                
    {!! Form::close() !!}   
    
@endsection