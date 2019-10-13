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
        
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>