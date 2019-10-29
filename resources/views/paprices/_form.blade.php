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
                        <label for="plan_id">Plan</label>
                        {!! Form::select('plan_id', $plans,null, ['class' => 'form-control']) !!}
                </div>
        
        
        </div>
        <div class="form-group row">
                        <div class="col-sm-6">
                                <label for="period_id">Period</label>
                                {!! Form::select('period_id', $periods,null, ['class' => 'form-control']) !!}
                        </div>
                
                
                </div>   
                    
<div class="form-group row">
    
    <div class="col-sm-3">
            <label for="amount">Price</label>    
            {!! Form::input('number', 'amount', null, ['class' => 'form-control']) !!}
    </div>
</div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>