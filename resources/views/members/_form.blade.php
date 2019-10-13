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
    <div class="col-sm-12">
            <label for="insured_name">Full name</label>    
            {!! Form::text('insured_name', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-6">
            <label for="dob">Date of birth</label>
            <div class="input-group">
                    {!! Form::text('dob', null, ['class' => 'form-control datepicker', 'id'=>'dob']) !!}
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary picker" id="dob_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                            
                        </div>
            </div> 

    </div>
    <div class="col-sm-6">
            <label for="insured_id">ID/Passport</label>    
            {!! Form::text('insured_id', null, ['class' => 'form-control']) !!}    
    </div>
</div>

<div class="form-group row">
    
    <div class="col-sm-6">
            <label for="dob">Gender</label>
        <div class="form-check">
                <label class="form-check-label">
                        
                        {!! Form::radio('gender', 'M',true, ['class' => 'form-check-input']) !!}
                        Male</label>
        </div>
        <div class="form-check">
                <label class="form-check-label">
                        
                        {!! Form::radio('gender', 'F',false, ['class' => 'form-check-input']) !!}
                        Female</label>
        </div>
            
    </div>
    <div class="col-sm-6">
            <label for="naty">Nationality</label>
            {!! Form::select('naty', $country,null, ['class' => 'form-control']) !!}    
    </div>
</div>

<div class="form-group row">
        
        <div class="col-sm-6">
                <label for="ownship">Relationship with policy holder</label>
                {!! Form::select('ownship', $relationship,null, ['class' => 'form-control']) !!}
                  
        </div>
    </div>

<div class="row">
    <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"> {{ $button_name }} </button>        
    </div>
</div>
