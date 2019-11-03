@extends('dashboard.master')
@section('title')
Benefit
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'benefits.index', 'title'=>$product->title,'parameter'=> $product->id], 
    ['title'=>'Update']]])
                {!! Form::model($model, array('route' => array('benefits.update', $model->product_id, $model->id), 'method'=>'PUT')) !!}
                
                    @include('benefits._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection