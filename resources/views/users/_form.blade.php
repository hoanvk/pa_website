<div class="form-group row">
    <div class="col-sm-6">
        <label for="name">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="email">Email</label>    
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
        <div class="col-sm-6">
            <label for="password">Password</label>    
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        
    </div>
<div class="form-group row">
  <div class="col-sm-6">
      <label for="role_id">Role</label>
      {!! Form::select('role_id', $role,null, ['class' => 'form-control']) !!}
  </div>
  
 
</div>
<div class="form-group row">
        <div class="col-sm-6">
            <label for="agent_id">Agent</label>
            {!! Form::select('agent_id', $agent,null, ['class' => 'form-control']) !!}
        </div>
        
       
      </div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>