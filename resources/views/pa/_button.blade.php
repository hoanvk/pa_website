@if(@isset($tabs) && @isset($policy))
    <div class="btn-group">
        @if ($tabs=='quotation')
            <a href="{{ route('pa.index')}} " class="btn btn-primary">@lang('pa.previous')</a>
            @if ($policy->status > 1)
            <a href="{{route('customers.show',['policy_id'=>$policy->id, 'id'=>$policy->customer_id==null?0:$policy->customer_id]) }}" class="btn btn-danger">@lang('pa.next')</a>
            @endif
        
        @elseif ($tabs=='customers')
            <a href="{{route('pa.show',['product_id'=>$product->id,'id'=>$policy->id]) }}" class="btn btn-primary">@lang('pa.previous')</a>
            @if ($policy->status > 2)
            <a href="{{route('members.index',$policy->id) }}" class="btn btn-danger">@lang('pa.next')</a>
            @endif
        
        @elseif ($tabs=='members')
            <a href="{{route('customers.show',['policy_id'=>$policy->id, 'id'=>$policy->customer_id==null?0:$policy->customer_id]) }}" class="btn btn-primary">@lang('pa.previous')</a>
            @if ($policy->status > 3)
            <a href="{{route('pa.confirm',$policy->id) }}" class="btn btn-danger">@lang('pa.next')</a>
            @endif
        
        @elseif ($tabs=='confirm')
            <a href="{{route('members.index',$policy->id) }}" class="btn btn-primary">@lang('pa.previous')</a>
        @endif
        
        
    </div>
@endif

