@extends('shared.master')
@section('title')
    Policy Search
@endsection

@section('content-fluid')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="pull-left">
    <h2>@lang('travel.index')</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-outline-primary" href="{{route('travel.export')}} ">{{ trans('travel.export')}} </a>
        <a class="btn btn-primary" href="{{route('travel.create')}} ">Create New</a>
    </div>
    
    <div class="table-responsive">
            <table class="table">
                    <thead>
                        <tr>
                                <th>Quotation</th>
                            <th>Agent</th>
                            <th>Plan</th>
                            <th>Destination</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Policy type</th>
                            <th>Premium</th>
                            <th>Status</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($model as $item)
                        @php
                        $risk = optional($item->risks->first());
                        @endphp
                        
                        <tr>
                            <td>{{ $item->quotation_no}} </td>
                            <td scope="row">{{ $item->agent->name }}</td>
                                <td>{{ optional($risk->plan)->name }}</td>
                            <td>{{ optional($risk->destination)->name }}
                                </td>
                                <td>{{ date('d-m-Y', strtotime($item->start_date)) }} </td>
                                <td>{{ date('d-m-Y', strtotime($item->end_date)) }} </td>
                                <td>{{ optional($policy_type->firstWhere('item_item', '=', $risk->policy_type))->long_desc}} </td>
                            <td>{{ $item->premium}} </td>
                            <td>{{ optional($status->firstWhere('item_item', '=', $item->status))->long_desc}} </td>
                            
                            <td><a href="{{  route('travel.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>   
    </div>
    
    {!! $model->links() !!}
@endsection