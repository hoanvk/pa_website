@extends('shared.master')
@section('title')
    @lang('customers.policy_holder')
@endsection

@section('left-menu')
    @include('shared._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('customers.policy_holder')
@endsection

@section('content')
@include('pa._status')
@include('shared._message')
        <table class="table">
            <tbody>
            
                <tr>
                    <td scope="row">@lang('customers.name')</td>
                    <td>{{ $customer->name }}</td>
                    
                </tr>
                <tr>
                    <td scope="row">@lang('customers.dob')</td>
                    <td>{{ date('d/m/Y', strtotime($customer->dob)) }}</td>
                    
                </tr>
                
                <tr>
                    <td scope="row">@lang('customers.identity')</td>                
                    <td>{{ $customer->tgram }}</td>
                </tr>
                <tr>
                    <td scope="row">@lang('customers.email')</td>                
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <td scope="row">@lang('customers.mobile')</td>                
                    <td>{{ $customer->mobile }}</td>
                </tr>
                <tr>
                    <td scope="row">@lang('customers.address')</td>                
                    <td>{{ $customer->address }}</td>
                </tr>
                <tr>
                    <td scope="row">@lang('customers.gender')</td>                
                    <td>{{ optional($gender->firstWhere('item_item','=',$customer->gender))->long_desc }}</td>
                </tr>
                <tr>
                    <td scope="row">@lang('customers.province')</td>                
                    <td>{{ $customer->city }}</td>
                </tr>
                <tr>
                    <td>@lang('customers.nationality')</td>                
                    <td>{{ $customer->natlty }}</td>
                </tr>
            </tbody>
        </table>   
        <a class="btn btn-outline-primary" href="{{route('customers.edit',
                    ['policy_id'=>$customer->policy_id, 'id'=>$customer->id])}} ">@lang('customers.edit')</a>
        @include('pa._button')

@endsection