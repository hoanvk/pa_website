@extends('shared.master')
@section('title')
Personal Insurance
@endsection

@section('content-fluid')
@foreach ($product_type as $item_type)
<div class="mt-3 ml-2">
        <h3>
                {{$item_type->title }}
            </h3>
            <p>
                    {{$item_type->description }}
            </p>
</div>

<div class="card-deck">
        @foreach ($model as $product)
        @if ($product->product_type == $item_type->name)
            <div class="card">
                <div class="card-header">
                    {{$product->title}}
                </div>
                <div class="card-body">
                    <h4 class="card-title">@lang('pa.benefit')</h4>
                    <p class="card-text">
                            <ul class="list-group list-group-flush">
                                @foreach ($product->benefits as $benefit)
                                <li class="list-group-item">{{ $benefit->title}} </li>
                                @endforeach
                                    
                                    
                                    </ul>
                        </p>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('pa.create',$product->id)}} " class="btn btn-danger btn-block">@lang('pa.buy_now')</a>
                </div>
            </div> 
        @endif
        
      
        @endforeach   
         
    </div>
    
@endforeach

    
@endsection