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
                {!! Form::select('agent_id', $agent,null, ['class' => 'form-control']) !!}
        </div>


</div>
    
<div class="form-group row">
    
    <div class="col-sm-3">
            <label for="limit_bal">Limit Balance</label>    
            {!! Form::input('number', 'limit_bal', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-3">
                <label for="os_bal">Oustanding Balance</label>    
                {!! Form::input('number', 'os_bal', null, ['class' => 'form-control']) !!}
        </div>
</div>

<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>