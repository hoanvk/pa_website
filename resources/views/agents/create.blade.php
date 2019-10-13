@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-left"><h2>Create</h2></div>
            <div class="pull-right"><a href="{{ route('agents.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Back to Index</a></div>
        </div>
    </div>
        
        
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open([
    'route' => ['agents.store'],
    'method' => 'POST'

]) !!}

 
<!-- TODO: This is for server side, there is another version for browser defaults -->
{{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('agents._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}   
@endsection