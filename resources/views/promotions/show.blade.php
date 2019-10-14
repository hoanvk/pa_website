@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
        <div class="pull-left">
            <h2>Details</h2>
        </div>
    <div class="pull-right"><a href="{{ route('promotions.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        @lang('shared.back')</a></div>
    
    
    
    <table class="table">
        <tbody>
                <tr>
                        <td scope="row">@lang('promotions.product')</td>
                        <td>{{ $model->product->title }}</td>
                        
                    </tr>
                    <tr>
                        <td>@lang('promotions.promo_code')</td>
                        <td>{{ $model->promo_code }}</td>
                        
                    </tr>
                    <tr>
                        <td>@lang('promotions.discount')</td>
                        <td>{{ $model->discount }}</td>
                        
                    </tr>
            <tr>
                <td scope="row">@lang('promotions.start_date')</td>
                <td>{{ $model->start_date }}</td>
                
            </tr>
            
            <tr>
                <td scope="row">@lang('promotions.end_date')</td>
                <td>{{ $model->end_date }}</td>
                
            </tr>
        </tbody>
    </table>   
    <p>
        
        {!! Form::model($model, array('route' => array('promotions.destroy', $model->id), 'method'=>'DELETE')) !!}
        
        <a class="btn btn-primary" href="{{route('promotions.edit',$model->id)}} ">Edit Item</a>
        <button type="submit" class="btn btn-danger">@lang('shared.delete')</button>
        {!! Form::close() !!} 
    </p>
@endsection