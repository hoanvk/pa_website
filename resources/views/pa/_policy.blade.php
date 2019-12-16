@isset($policy)
<div class="card">
        
    <div class="card-header bg-primary">POLICY</div>
    <div class="card-body">
        
        <div class="list-group list-group-flush">
                <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        @lang('pa.quotation_no'): <mark>{{ $policy->quotation_no}}</mark></div>
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                @lang('pa.premium'): <mark>{{ $policy->premium}}</mark></div>
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                @lang('pa.from_date'): <mark>{{ $policy->start_date}}</mark></div>
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                @lang('pa.to_date'): <mark>{{ $policy->end_date}}</mark></div>
                                                    
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                @lang('pa.product'): <mark>{{ $policy->product->title}}</mark></div>
                @isset($risk)
                <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        @lang('pa.plan'): <mark>{{ $risk->plan->title}}</mark></div>    
                <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        @lang('pa.period'): <mark>{{ $risk->period->title}}</mark></div>  
                @endisset
                 
                                                    
        </div>
    </div> 
    
</div>
<br>
@endisset

        