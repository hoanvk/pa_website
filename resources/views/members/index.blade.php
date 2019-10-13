@extends('shared.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
        <div class="container">
                <div class="container">
                        <div class="row">
                                <div class="col-sm-4">               
                                        @include('travel._policy')
                                    </div>
                        
                                    <div class="col-sm-8">
    @if (session('success'))
        <div class="alert alert-info">{{session('success')}}</div>
    @endif
    <div class="row">
        <div class="col-sm-12">
                <div class="pull-left"><a href="{{ route('travel.show',$policy_id)}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
                    Back to Policy</a></div>
                <div class="pull-right"><a class="btn btn-primary" href="{{route('members.create',$policy_id)}} ">Create New</a></div>
        </div>
    </div>
    
    
    @include('members._insured')
                                    </div>
                        </div>
@endsection