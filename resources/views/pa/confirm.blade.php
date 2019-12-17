@extends('shared.master')
@section('title')
Personal Accident
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('pa.checkout')
@endsection

@section('content')
 
      
@include('pa._status')
@include('shared._message')
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">@lang('pa.quotation_no')</td>
                <td>{{ $model->quotation_no }}</td>
                
            </tr>
            <tr>
                <td scope="row">@lang('pa.policy_no')</td>
                <td>{{ $model->policy_no }}</td>
                
            </tr>
            <tr>
                <td scope="row">@lang('customers.name')</td>
                <td>{{ optional($model->customer)->name }}</td>
                
            </tr>
            <tr>
                <td scope="row">@lang('customers.address')</td>
                <td>{{ optional($model->customer)->address }}</td>
                
            </tr>
            <tr>
                <td scope="row">@lang('customers.identity')</td>                
                <td>{{ optional($model->customer)->tgram }}</td>
            </tr>
            <tr>
                <td scope="row">@lang('pa.product')</td>                
                <td>{{ $model->product->title }}</td>
            </tr>
            <tr>
                <td scope="row">@lang('pa.plan')</td>                
                <td>{{ $model->parisk->plan->title }}</td>
                </tr>
            <tr>
                <td scope="row">@lang('pa.period')</td>                
                <td>{{ $model->parisk->period->title }}</td>
            </tr>
            <tr>
                <td scope="row">@lang('pa.from_date')</td>                
                <td>{{ $model->start_date }}</td>
            </tr>
            <tr>
                <td scope="row">@lang('pa.to_date')</td>                
                <td>{{ $model->end_date }}</td>
            </tr>
            
            <tr>
                <td scope="row">@lang('pa.premium')</td>                
                <td>{{ $model->premium }}</td>
            </tr>
            
        </tbody>
    </table>  
   
    @if ($model->status == 4)
    <a class="btn btn-primary" href="{{route('checkout.index',$model->id)}} ">@lang('pa.checkout')</a>
        
    @endif
    @include('pa._button')


@endsection