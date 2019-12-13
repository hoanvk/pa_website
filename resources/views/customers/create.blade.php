@extends('shared.master')
@section('title')
    Policy Holder
@endsection

@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('customers.policy_holder')
@endsection

@section('content')
{{-- @include('pa._tabs') --}}
{!! Form::open([
    'route' => ['customers.store',$policy->id],
    'method' => 'POST'
  
  ]) !!}
  
  
  <!-- TODO: This is for server side, there is another version for browser defaults -->
  {{-- <form action="{{ route('article.store') }}" method="POST">
        {{ csrf_field() }} --}}
    @include('customers._form',[ 'button_name' => 'customers.create'])
  {{-- </form> --}}
  {!! Form::close() !!}   
        
@endsection
 