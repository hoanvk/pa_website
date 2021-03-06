@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left"><h2>Update</h2></div>
        <div class="pull-right"><a href="{{ route('prices.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
            Back to Index</a></div>
        </div>
    </div>
       
    
{!! Form::model($price, array('route' => array('prices.update', $price->id), 'method'=>'PUT')) !!}
{{-- {!! Form::open([
    'route' => ['item.update',$model->id],
    'method' => 'PUT'

]) !!} --}}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('prices._form',[ 'button_name' => 'Update'])
{{-- </form> --}}
{!! Form::close() !!}   
@endsection