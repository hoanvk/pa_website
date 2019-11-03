@extends('shared.master')
@section('title')
Personal Accident
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('pa.quotation')
@endsection
@section('content')
 
      
@include('pa._status')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif            
 
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">@lang('pa.quotation_no')</td>
                <td>{{ $model->quotation_no }}</td>
                
            </tr>
            
            <tr>
                <td scope="row">@lang('pa.from_date')</td>                
                <td>{{ date('d/m/Y', strtotime($model->start_date)) }}</td>
            </tr>
            <tr>
                <td scope="row">@lang('pa.to_date')</td>                
                <td>{{ date('d/m/Y', strtotime($model->end_date)) }}</td>
            </tr>
            
            <tr>
                <td scope="row">@lang('pa.premium')</td>                
                <td>{{ $model->premium }}</td>
            </tr>
            
        </tbody>
    </table>  
    
    @if ($model->status < 6)
    
        <a class="btn btn-outline-primary" href="{{route('pa.edit',['product_id'=>$product->id,'id'=>$model->id])}} ">@lang('pa.edit')</a>
        
    
    @endif

    @include('pa._button')

@endsection
