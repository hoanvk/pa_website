@isset($policy)
<div class="card">
        
    <div class="card-header bg-primary">POLICY</div>
    <div class="card-body">
        
        <div class="list-group list-group-flush">
                <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        Quotation No: {{ $policy->quotation_no}}</div>
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                Premium: {{ $policy->premium}}</div>
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                    From Date: {{ date('d/m/Y', strtotime($policy->start_date))}}</div>
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                    To Date: {{ date('d/m/Y', strtotime($policy->end_date))}}</div>
                                                    
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                Product: {{ $policy->product->title}}</div>
                <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                    Plan: {{ $policy->parisk->plan->title}}</div>    
            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        Insurance period: {{ $policy->parisk->period->title}}</div>   
                                                    
        </div>
    </div> 
    
</div>
<br>
@endisset

        