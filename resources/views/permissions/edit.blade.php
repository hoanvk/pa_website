@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
@include('dashboard._breadcrumb',['nodes' =>[['action'=>'permissions.index', 'title'=>'Index'], ['title'=>'Update']]])
                {!! Form::model($model, array('route' => array('permissions.update', $model->id), 'method'=>'PUT')) !!}
                
                    @include('permissions._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection