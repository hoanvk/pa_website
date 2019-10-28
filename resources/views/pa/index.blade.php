@extends('shared.master')
@section('title')
    Bao hiem ca nhan | MSIG
@endsection

@section('content-fluid')
<div class="card-deck">
    @foreach ($model as $product)
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
  
    @endforeach   
     
</div>

    
@endsection