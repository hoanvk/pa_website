@extends('shared.master')
@section('title')
Personal Accident | MSIG
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    QUOTATION
@endsection
@section('content')
 
      
@include('pa._tabs')
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
                <td scope="row">Quotation No</td>
                <td>{{ $model->quotation_no }}</td>
                
            </tr>
            <tr>
                <td scope="row">Policy Number</td>
                <td>{{ $model->policy_no }}</td>
                
            </tr>
            <tr>
                <td scope="row">Insured Name</td>
                <td>{{ $model->client_name }}</td>
                
            </tr>
            <tr>
                <td scope="row">Insured Address</td>
                <td>{{ $model->client_address }}</td>
                
            </tr>
            <tr>
                <td scope="row">Identity No</td>                
                <td>{{ $model->client_id }}</td>
            </tr>
            {{-- <tr>
                <td scope="row">Product</td>                
                <td>{{ $model->product->title }}</td>
            </tr>
            <tr>
                <td scope="row">Plan</td>                
                <td>{{ $risk->plan->title }}</td>
                </tr>
            <tr>
                <td scope="row">Insurance period</td>                
                <td>{{ $risk->period->title }}</td>
            </tr> --}}
            <tr>
                <td scope="row">Start Date</td>                
                <td>{{ date('d/m/Y', strtotime($model->start_date)) }}</td>
            </tr>
            <tr>
                <td scope="row">End Date</td>                
                <td>{{ date('d/m/Y', strtotime($model->end_date)) }}</td>
            </tr>
            
            <tr>
                <td scope="row">Premium</td>                
                <td>{{ $model->premium }}</td>
            </tr>
            
        </tbody>
    </table>  
   
    @if ($model->status == '1')
    <p>
        <a class="btn btn-outline-primary" href="{{route('pa.edit',['product_id'=>$product->id,'id'=>$model->id])}} ">Edit Quotation</a>
        <a class="btn btn-primary" href="{{route('pa.confirm',['product_id'=>$product->id,'id'=>$model->id])}} ">Confirm</a>
    </p>
    @endif



@endsection