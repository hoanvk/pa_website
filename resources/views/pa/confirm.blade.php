@extends('shared.master')
@section('title')
Personal Accident
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('pa.payment')
@endsection
{{-- @section('card-tab')
<ul class="nav nav-tabs card-header-tabs nav-justified">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
@endsection --}}
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
   
    @if ($model->status == 4)
    <a class="btn btn-primary" href="{{route('pa.confirm',['product_id'=>$product->id,'id'=>$model->id])}} ">@lang('pa.payment')</a>
        
    @endif
    @include('pa._button')


@endsection