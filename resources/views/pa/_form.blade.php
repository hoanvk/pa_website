<div class="form-group">
    <label for="quotation_no">Quotation No</label>
    {!! Form::text('quotation_no', $quotation_no, ['class' => 'form-control','disabled'=>'"disabled"']) !!}
</div>
<div class="form-group">
    <label for="insured_name">Insured Name</label>    
    {!! Form::text('insured_name', null, ['class' => 'form-control']) !!}
</div>
<div class="row">
    <div class="col-sm-6">
            <div class="form-group">
                    <label for="insured_id">Identity No</label> 
                    {!! Form::text('insured_id', null, ['class' => 'form-control']) !!}
                      
                    
                </div>
    </div>
    <div class="col-sm-6">
            <div class="form-group">
                    <label for="insured_dob">Date of birth</label>
                    <div class="input-group">
                            {!! Form::text('insured_dob', null, ['class' => 'form-control datepicker']) !!}
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                    
                                </div>
                    </div> 
                    
                    
                </div> 
                
                
        </div>
    
</div>



<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>