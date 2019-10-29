@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left"><h2>Create</h2></div>  
<div class="pull-right"><a href="{{ route('paprices.index',$product_id)}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Back to Index</a></div>
        </div>
    </div>
    
{!! Form::open([
    'route' => ['paprices.store',$product_id],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('paprices._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}  
        
        
@endsection