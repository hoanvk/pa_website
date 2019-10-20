@extends('dashboard.master')
@section('title')
Period | MSIG
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'periods.index', 'title'=>'Index'], ['title'=>'Update']]])
                {!! Form::model($model, array('route' => array('periods.update', $model->id), 'method'=>'PUT')) !!}
                
                    @include('periods._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection