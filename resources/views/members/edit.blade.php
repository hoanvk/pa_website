@extends('shared.master')
@section('title')
Insured Person
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
    @lang('members.insured_person')
@endsection
@section('content')

{{-- @include('pa._tabs') --}}
        
        
    {!! Form::model($member, array('route' => array('members.update',$policy->id, $member->id), 'method'=>'PUT')) !!}
    
        @include('members._form',[ 'button_name' => 'members.edit'])
        
    {{-- </form> --}}
    {!! Form::close() !!}   
                           
@endsection
