@extends('dashboard.master')
@section('title')
Benefit | MSIG
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'benefits.index', 'title'=>'Index'], ['title'=>'Update']]])
                {!! Form::model($model, array('route' => array('benefits.update', $model->id), 'method'=>'PUT')) !!}
                
                    @include('benefits._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection