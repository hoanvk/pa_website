@extends('shared.master')
@section('title')
    Confirmation
@endsection
@section('content')

            
<div class="container">
        <div class="row">
                <div class="col-sm-4">               
                        @include('travel._help')
                </div>
                <div class="col-sm-8">
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
                        
    <div class="pull-left">
        <h2>{{ optional($status->firstWhere('item_item','=',$model->status))->long_desc }}</h2>
    </div>
<div class="pull-right"><a href="{{ route('travel.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
    Back to Index</a></div>

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
            <tr>
                <td scope="row">Product</td>                
                <td>{{ $model->product->title }}</td>
            </tr>
            <tr>
                    <td scope="row">Destination</td>                
                    <td>{{ $risk->plan->title }}</td>
                </tr>
            <tr>
                <td scope="row">Destination</td>                
                <td>{{ $risk->destination->title }}</td>
            </tr>
            <tr>
                <td scope="row">Start Date</td>                
                <td>{{ date('d-m-Y', strtotime($model->start_date)) }}</td>
            </tr>
            <tr>
                <td scope="row">End Date</td>                
                <td>{{ date('d-m-Y', strtotime($model->end_date)) }}</td>
            </tr>
            <tr>
                <td>Period</td>                
                <td>{{ $model->period }}</td>
            </tr>
            <tr>
                <td scope="row">Premium</td>                
                <td>{{ $model->premium }}</td>
            </tr>
            <tr>
                    <td scope="row">Policy type</td>                
                    <td>{{ optional($policy_type->firstWhere('item_item','=',$risk->policy_type))->long_desc }}</td>
                </tr>
                <tr>
                        <td>Adult</td>                
                        <td>{{ $risk->adult_qty }}</td>
                    </tr>
                    <tr>
                            <td>Dependent</td>                
                            <td>{{ $risk->dependent_qty }}</td>
                        </tr>
            <tr>
                <td>Reference Number</td>                
                <td>{{ $model->ref_number }}</td>
            </tr>
            <tr>
                <td>Remarks</td>                
                <td>{{ $model->remarks }}</td>
            </tr>
        </tbody>
    </table>  
    <div class="row">
            <div class="col-sm-12">
                    <a href="{{ route('members.index', $model->id)}} " class="btn btn-link"><i class="fa fa-edit"></i>
                        Insured person</a>
            </div>
    </div> 
    @if ($model->status == '1')
    <p>
        <a class="btn btn-outline-primary" href="{{route('travel.edit',$model->id)}} ">Edit Quotation</a> 
        <a class="btn btn-primary" href="{{route('travel.confirm',$model->id)}} ">Confirm</a>
    </p>
    @endif

</div>

@endsection