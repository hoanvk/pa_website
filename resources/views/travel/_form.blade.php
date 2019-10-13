<div class="row">
    <div class="col-sm-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
        {{-- <div class="col-sm-6">
                <label for="quotation_no">Agent</label>
                <p class="font-weight-bold">{{ $agent->title }} </p>
    </div> --}}
    @if ($button_name == 'Update')
    <div class="col-sm-6">
            <label for="quotation_no">Quotation No</label>
            {!! Form::text('quotation_no', null, ['class' => 'form-control','disabled'=>'"disabled"']) !!}    
    </div>
    @endif
    
    
</div>
<div class="form-group row">
        <div class="col-sm-6">
                <label for="plan_id">Plan</label>
                {!! Form::select('plan_id', $plans,null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
                        <label for="destination_id">Destination</label>
                        {!! Form::select('destination_id', $destinations,null, ['class' => 'form-control']) !!}
                </div>

</div>


    <div class="form-group row">
            <div class="col-sm-6">
                    <label for="start_date">From Date</label>
                            <div class="input-group">
                                    {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'id'=>'start_date']) !!}
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary picker" id="start_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                            
                                        </div>
                            </div> 
            </div>                
                    
            <div class="col-sm-6">
            
                    <label for="end_date">To Date</label>
                    <div class="input-group">
                            {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'id'=>'end_date']) !!}
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary picker" id="end_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                    
                                </div>
                    </div> 
                
                </div>                
        </div> 
        <div class="form-group row">
                        <div class="col-sm-2">
                                        <label for="policy_type">Policy Type</label>
                                        
                                                
                                        </div>
                                        <div class="col-sm-10">                
                        <div class="form-check-inline">
                        <label for="policy_type" class="form-check-label">
                        {!! Form::radio('policy_type', 'I', null, ['class' => 'form-check-input'])!!}
                        Individual</label>
                        
                        </div>   
                        <div class="form-check-inline">
                                        
                                        <label for="policy_type" class="form-check-label">
                                        {!! Form::radio('policy_type', 'G', null, ['class' => 'form-check-input'])!!}
                                        Group</label>
                                        
                                        </div>  
                        <div class="form-check-inline">
                                        
                                        <label for="policy_type" class="form-check-label">
                                        {!! Form::radio('policy_type', 'F', null, ['class' => 'form-check-input'])!!}
                                        Family</label>
                                                
                                                
                                        
                                                        </div>     
                        </div>   
                </div>
                <div class="form-group row">
    
                                <div class="col-sm-3">
                                        <label for="adult_qty">Adult</label>    
                                        {!! Form::input('number', 'adult_qty', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-3">
                                                <label for="dependent_qty">Dependent</label>    
                                                {!! Form::input('number', 'dependent_qty', null, ['class' => 'form-control']) !!}
                                        </div>
                        <div class="col-sm-6">
                                <label for="ref_number">Reference Number</label>    
                                {!! Form::text('ref_number', null, ['class' => 'form-control']) !!}
                        </div>                                        
                            </div>
                <div class="form-group row">
                        <div class="col-sm-12">
                                <label for="remarks">Remarks</label>    
                                {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!} 
                        </div>
                </div>            
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>