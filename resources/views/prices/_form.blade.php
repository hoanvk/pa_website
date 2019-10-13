@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group row">
        <div class="col-sm-6">
                <label for="agent_id">Agent</label>
                {!! Form::select('agent_id', $agents,null, ['class' => 'form-control']) !!}
        </div>


</div>
<div class="form-group row">
                <div class="col-sm-6">
                        <label for="plan_id">Plan</label>
                        {!! Form::select('plan_id', $plans,null, ['class' => 'form-control']) !!}
                </div>
        
        
        </div>
        <div class="form-group row">
                        <div class="col-sm-6">
                                <label for="destination_id">Destination</label>
                                {!! Form::select('destination_id', $destinations,null, ['class' => 'form-control']) !!}
                        </div>
                
                
                </div>   
                <div class="form-group row">
                                <div class="col-sm-6">
                                        <label for="day_range_id">Day range</label>
                                        {!! Form::select('day_range_id', $dayRanges,null, ['class' => 'form-control']) !!}
                                </div>
                        
                        
                        </div>        
<div class="form-group row">
    
    <div class="col-sm-3">
            <label for="amount">Price</label>    
            {!! Form::input('number', 'amount', null, ['class' => 'form-control']) !!}
    </div>
</div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>