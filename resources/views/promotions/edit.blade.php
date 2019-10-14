@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left"><h2>@lang('shared.edit')</h2></div>
        <div class="pull-right"><a href="{{ route('promotions.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
            @lang('shared.back')</a></div>
        </div>
    </div>
       
    
{!! Form::model($model, array('route' => array('promotions.update', $model->id), 'method'=>'PUT')) !!}

@include('promotions._form',[ 'button_name' => 'Update'])

{!! Form::close() !!}   
@endsection