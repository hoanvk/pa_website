@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'periods.index', 'title'=>'Index', 'parameter'=>$model->product->id], ['title'=>'Update']]])
                {!! Form::model($model, array('route' => array('periods.update', $model->product->id, $model->id), 'method'=>'PUT')) !!}
                
                    @include('periods._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection