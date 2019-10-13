<div class="card">
        <div class="card-header bg-primary">AGENT BALANCE</div>
        <div class="card-body">
                <div class="list-group list-group-flush">
                        <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                                Agent: {{ $agent->title}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        Limit: {{ $agent->cash->limit_bal}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        Outstanding: {{ $agent->cash->os_bal}}</div>    
                </div>
        </div> 
        
        
</div>
<br>
<div class="card">
        
    
        
        <div class="card-header bg-primary">POLICY</div>
        <div class="card-body">
            
                <div class="list-group list-group-flush">
                        <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                                Quotation: {{ $policy->quotation_no}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        Premium: {{ $policy->premium}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                            From Date: {{ date('d/m/Y', strtotime($policy->start_date))}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                            To Date: {{ date('d/m/Y', strtotime($policy->end_date))}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                            Period: {{ $policy->period}}</div>                                        
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                        Product: {{ $policy->product->title}}</div>
                        <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                            Plan: {{ $risk->plan->title}}</div>    
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                            Destination: {{ $risk->destination->title}}</div>   
                            <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                                    Adult: {{ $risk->adult_qty}}</div>                                
                                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                                            Dependent: {{ $risk->dependent_qty}}</div>                                
                </div>
            </div> 
            
        </div>
        {{-- <table class="table">
                
                <tbody>
                    <tr>
                        <td scope="row">Premium</td>
                        <td>{{ $policy->premium}}</td>
                        
                    </tr>
                    <tr>
                        <td scope="row">From Date:</td>
                        <td>{{ date('d/m/Y', strtotime($policy->start_date))}}</td>
                        
                    </tr>
                    <tr>
                            <td scope="row">To Date:</td>
                            <td>{{ date('d/m/Y', strtotime($policy->end_date))}}</td>
                            
                        </tr>
                        <tr>
                                <td scope="row">Product:</td>
                                <td>{{ $risk->product->title}}</td>
                                
                            </tr>
                            
                </tbody>
            </table>
            
        <ul class="list-group">
                <li class="list-group-item active">POLICY</li>
                <li class="list-group-item">Premium: {{ $policy->premium}}</li>
                <li class="list-group-item">From Date: {{ date('d/m/Y', strtotime($policy->start_date))}}</li>
                <li class="list-group-item">To Date: {{ date('d/m/Y', strtotime($policy->end_date))}}</li>
                <li class="list-group-item">Product: {{ $risk->product->title}}</li>
              </ul> --}}
         