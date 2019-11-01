@extends('shared.master')
@section('title')
    Table Setup
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    INSURED PERSON
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-info">{{session('success')}}</div>
    @endif
    @include('pa._tabs')
    
    @include('members._insured')
                                    </div>
                        </div>
@endsection