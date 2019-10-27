@extends('shared.master')
@section('title')
    Bao hiem ca nhan | MSIG
@endsection

@section('content-fluid')
<div class="card-deck">
    @foreach ($model as $item)
    <div class="card">
            <div class="card-header">
                {{$item->title}}
            </div>
            <div class="card-body">
                <h4 class="card-title">Benefits</h4>
                <p class="card-text">
                        <ul class="list-group list-group-flush">
                            @foreach ($item->benefits as $benefit)
                            <li class="list-group-item">{{ $benefit->description}} </li>
                            @endforeach
                                
                                
                              </ul>
                    </p>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('pa.create',$item->id)}} " class="btn btn-danger btn-block">Buy now</a>
            </div>
        </div>  
        
    @endforeach    
</div>

    
@endsection