@extends('shared.master')
@section('title')
Policy Holder
@endsection

@section('left-menu')
    @include('shared._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    POLICY HOLDER
@endsection
@section('content')
{{-- @include('pa._tabs') --}}
    {!! Form::model($customer, array('route' => array('customers.update',$customer->policy_id, $customer->id), 'method'=>'PUT')) !!}
    
    @include('customers._form',[ 'button_name' => 'customers.edit'])
    {{-- </form> --}}
    {!! Form::close() !!}   
                            
@endsection
