@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left"><h2>Update</h2></div>
        <div class="pull-right"><a href="{{ route('paprices.index',$model->product_id)}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
            Back to Index</a></div>
        </div>
    </div>
       
    
{!! Form::model($model, array('route' => array('paprices.update', $model->product_id, $model->id), 'method'=>'PUT')) !!}

    @include('paprices._form',[ 'button_name' => 'Update'])

{!! Form::close() !!}   
@endsection