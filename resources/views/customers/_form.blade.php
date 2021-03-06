@section('css')
<link href="/css/app.css" rel="stylesheet">
@endsection
@include('pa._status')
@include('shared._message')

<div class="form-group row">
    <div class="col-sm-12">
            <label for="name">@lang('customers.name')</label>    
            {!! Form::text('name', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-6">
        <label for="email">@lang('customers.email')</label>    
        {!! Form::text('email', null, ['class' => 'form-control']) !!}    
    </div>
    <div class="col-sm-6">
            <label for="confirm_email">@lang('customers.confirm_email')</label>    
            {!! Form::text('confirm_email', null, ['class' => 'form-control']) !!}    
    </div>
</div>

<div class="form-group row">
        <div class="col-sm-6">
                <label for="dob">@lang('customers.gender') </label>
                <div class="ml-2">
                        <div class="custom-control custom-radio custom-control-inline">
                                {!! Form::radio('gender', 'M',true, ['class' => 'custom-control-input','id'=>'customRadio1']) !!}                
                                <label class="custom-control-label" for="customRadio1">@lang('customers.male') </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                {!! Form::radio('gender', 'F',false, ['class' => 'custom-control-input','id'=>'customRadio2']) !!}                
                                <label class="custom-control-label" for="customRadio2"> @lang('customers.female')</label>
                            </div>
                </div>


                
        </div>
    <div class="col-sm-6">
            <label for="dob"> @lang('customers.dob')</label>
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
                <label for="natlty">@lang('customers.nationality') </label>
                {!! Form::select('natlty', $countries,$customer->natlty, ['class' => 'form-control']) !!}
                  
        </div>
    <div class="col-sm-6">
        <label for="tgram">@lang('customers.identity') </label>    
        {!! Form::text('tgram', null, ['class' => 'form-control']) !!}    
    </div>
    
    
</div>
<div class="form-group row">
        <div class="col-sm-12">
                <label for="address">@lang('customers.address') </label>    
                {!! Form::text('address', null, ['class' => 'form-control']) !!}    
        </div>
        
    </div>
<div class="form-group row">
        
        <div class="col-sm-6">
                <label for="city">@lang('customers.province')</label>
                {!! Form::select('city', $cities,null, ['class' => 'form-control']) !!}
                  
        </div>
        <div class="col-sm-6">
                <label for="mobile">@lang('customers.mobile') </label>    
                {!! Form::text('mobile', null, ['class' => 'form-control']) !!}    
        </div>
    </div>
    <div class="mt-3">
        @if ($policy->status < 5)
        <button type="submit" class="btn btn-primary">@lang($button_name) </button>
        @endif
                
        @include('pa._button')
    </div>

@section('js')
    {{-- <script src="/js/app.js"></script>     --}}
    <script>
        $("#dob").datetimepicker({
                timepicker:false,           
                format:'d/m/Y',
                mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
                formatMask:'39/19/9999',
                maxDate:0
            });
            jQuery('#dob_picker').click(function(){
                jQuery('#dob').datetimepicker('show'); //support hide,show and destroy command
            });
        
       
        // jQuery.validator.methods["date"] = function (value, element) { return true; }
    </script>
@endsection  