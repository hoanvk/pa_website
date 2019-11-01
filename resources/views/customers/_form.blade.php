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
            <label for="name">Full name</label>    
            {!! Form::text('name', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-6">
        <label for="email">Email</label>    
        {!! Form::text('email', null, ['class' => 'form-control']) !!}    
    </div>
    <div class="col-sm-6">
            <label for="confirm_email">Confirm Email</label>    
            {!! Form::text('confirm_email', null, ['class' => 'form-control']) !!}    
    </div>
</div>

<div class="form-group row">
        <div class="col-sm-6">
                <label for="dob">Gender</label>
                <div class="ml-2">
                        <div class="custom-control custom-radio custom-control-inline">
                                {!! Form::radio('gender', 'M',true, ['class' => 'custom-control-input','id'=>'customRadio1']) !!}                
                                <label class="custom-control-label" for="customRadio1">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                {!! Form::radio('gender', 'F',false, ['class' => 'custom-control-input','id'=>'customRadio2']) !!}                
                                <label class="custom-control-label" for="customRadio2">Female</label>
                            </div>
                </div>


                
        </div>
    <div class="col-sm-6">
            <label for="dob">Date of birth</label>
            <div class="input-group">
                    {!! Form::text('dob', null, ['class' => 'form-control datepicker', 'id'=>'dob']) !!}
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary picker" id="dob_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                            
                        </div>
            </div> 

    </div>
    
    
</div>

<div class="form-group row">
        <div class="col-sm-6">
                <label for="natlty">Nationality</label>
                {!! Form::select('natlty', $countries,$model->natlty, ['class' => 'form-control']) !!}
                  
        </div>
    <div class="col-sm-6">
        <label for="tgram">ID/Passport</label>    
        {!! Form::text('tgram', null, ['class' => 'form-control']) !!}    
    </div>
    
    
</div>
<div class="form-group row">
        <div class="col-sm-12">
                <label for="address">Address</label>    
                {!! Form::text('address', null, ['class' => 'form-control']) !!}    
        </div>
        
    </div>
<div class="form-group row">
        
        <div class="col-sm-6">
                <label for="city">Province/City</label>
                {!! Form::select('city', $cities,null, ['class' => 'form-control']) !!}
                  
        </div>
        <div class="col-sm-6">
                <label for="mobile">Mobile</label>    
                {!! Form::text('mobile', null, ['class' => 'form-control']) !!}    
        </div>
    </div>

<div class="row">
    <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"> {{ $button_name }} </button>        
    </div>
</div>
@section('js')
    <script src="/js/jquery-ui.js"></script>    
    <script>
        $("#dob").datepicker({
                dateFormat: "dd/mm/yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""
            });
            $('#dob_picker').click(function(){
            $('#dob').datepicker('show');
            });
       
        jQuery.validator.methods["date"] = function (value, element) { return true; }
    </script>
@endsection  