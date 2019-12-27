@extends('dashboard.master')
@section('title')
    Promotion
@endsection
@section('content')
<div class="clearfix mb-2">    
    <span class="float-right"><a class="btn btn-primary" href="{{route('promotions.create')}} ">Create New</a></span>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>@lang('promotions.product')</th>
                <th>@lang('promotions.promo_code')</th>
                <th>@lang('promotions.discount')</th>
                <th>@lang('promotions.start_date')</th>
                <th>@lang('promotions.end_date')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->product->title }}</td>
                <td>{{ $item->promo_code }}</td>
                <td>{{ $item->discount }}</td>
                <td>{{ $item->start_date}} </td>
                <td>{{ $item->end_date}} </td>
                <td><a href="{{  route('promotions.show', $item->id) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection