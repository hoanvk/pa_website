@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left"><h2>@lang('shared.create')</h2></div>  
<div class="pull-right"><a href="{{ route('promotions.index')}} " class="btn btn-link">
    <i class="fa fa-chevron-left"></i>@lang('shared.back')</a></div>
        </div>
    </div>
    
{!! Form::open([
    'route' => ['promotions.store'],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('promotions._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}  
        
        
@endsection