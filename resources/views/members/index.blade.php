@extends('shared.master')
@section('title')
    Insured Person
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
@lang('members.insured_person')
@endsection
@section('content')
@include('pa._status')
    @if (session('success'))
        <div class="alert alert-info">{{session('success')}}</div>
    @endif
    {{-- @include('pa._tabs') --}}
    
    
    @include('members._insured')
    <a class="btn btn-primary" href="{{route('members.create',$policy->id)}} ">@lang('members.create')</a>
    @include('pa._button')
                                    </div>
                        </div>
@endsection