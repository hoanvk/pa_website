@extends('dashboard.master')
@section('title')
    Create
@endsection
@section('content')
{!! Form::open([
  'route' => ['items.store'],
  'method' => 'POST'

]) !!}
  @include('items._form',[ 'button_name' => 'Create'])
{{-- </form> --}}
{!! Form::close() !!}   
        
@endsection