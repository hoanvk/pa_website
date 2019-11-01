@extends('shared.master')
@section('title')
    Update
@endsection
@section('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">

{{-- <link rel="stylesheet" href="/css/themes/smoothness/jquery-ui.theme.css"> --}}
@endsection
@section('left-menu')
    @include('shared._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    POLICY HOLDER
@endsection
@section('content')
@include('pa._tabs')
    {!! Form::model($model, array('route' => array('customers.update',$policy_id, $model->id), 'method'=>'PUT')) !!}
    
    @include('customers._form',[ 'button_name' => 'Update'])
    {{-- </form> --}}
    {!! Form::close() !!}   
                            
@endsection
