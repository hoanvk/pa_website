@extends('shared.master')
@section('title')
    Policy Holder
@endsection
@section('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">

{{-- <link rel="stylesheet" href="/css/themes/smoothness/jquery-ui.theme.css"> --}}
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    POLICY HOLDER
@endsection

@section('content')
@include('pa._tabs')
{!! Form::open([
    'route' => ['customers.store',$policy->id],
    'method' => 'POST'
  
  ]) !!}
  
  
  <!-- TODO: This is for server side, there is another version for browser defaults -->
  {{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('customers._form',[ 'button_name' => 'Create'])
  {{-- </form> --}}
  {!! Form::close() !!}   
        
@endsection
 