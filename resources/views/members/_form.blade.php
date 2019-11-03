@include('pa._status')
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
            <label for="insured_name">@lang('members.name')</label>    
            {!! Form::text('insured_name', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-6">
            <label for="dob">@lang('members.dob')</label>
            <div class="input-group">
                    {!! Form::text('dob', null, ['class' => 'form-control datepicker', 'id'=>'dob']) !!}
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary picker" id="dob_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                            
                        </div>
            </div> 

    </div>
    <div class="col-sm-6">
            <label for="insured_id">@lang('members.identity')</label>    
            {!! Form::text('insured_id', null, ['class' => 'form-control']) !!}    
    </div>
</div>

<div class="form-group row">
    
    <div class="col-sm-6">
            <label for="dob">@lang('members.gender')</label>
            <div class="ml-2">
                    <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('gender', 'M',true, ['class' => 'custom-control-input','id'=>'customRadio1']) !!}                
                            <label class="custom-control-label" for="customRadio1">@lang('members.male')</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('gender', 'F',false, ['class' => 'custom-control-input','id'=>'customRadio2']) !!}                
                            <label class="custom-control-label" for="customRadio2">@lang('members.female')</label>
                        </div>
            </div>
            
    </div>
    <div class="col-sm-6">
            <label for="naty">@lang('members.nationality')</label>
            {!! Form::select('naty', $country,$member->naty, ['class' => 'form-control']) !!}    
    </div>
</div>

<div class="form-group row">
        
        <div class="col-sm-6">
                <label for="ownship">@lang('members.relationship')</label>
                {!! Form::select('ownship', $relationship,null, ['class' => 'form-control']) !!}
                  
        </div>
    </div>

<div class="row">
    <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"> @lang($button_name) </button>    
            @include('pa._button')    
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