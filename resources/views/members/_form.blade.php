
@include('pa._status')
@include('shared._message')
<div class="form-group row">
    <div class="col-sm-12">
            <label for="insured_name">@lang('members.name')</label>    
            {!! Form::text('insured_name', $member->insured_name, ['class' => 'form-control','id'=>'insured_name']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-6">
            <label for="dob">@lang('members.dob')</label>
            <div class="input-group">
                    {!! Form::text('dob', $member->dob, ['class' => 'form-control datepicker', 'id'=>'dob']) !!}
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary picker" id="dob_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                            
                        </div>
            </div> 

    </div>
    <div class="col-sm-6">
            <label for="insured_id">@lang('members.identity')</label>    
            {!! Form::text('insured_id', $member->insured_id, ['class' => 'form-control','id'=>'insured_id']) !!}    
    </div>
</div>

<div class="form-group row">
    
    <div class="col-sm-6">
            <label for="dob">@lang('members.gender')</label>
            <div class="ml-2">
                    <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('gender', 'M',true, ['class' => 'custom-control-input','id'=>'male']) !!}                
                            <label class="custom-control-label" for="male">@lang('members.male')</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('gender', 'F',false, ['class' => 'custom-control-input','id'=>'female']) !!}                
                            <label class="custom-control-label" for="female">@lang('members.female')</label>
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
                {!! Form::select('ownship', $relationship,$member->ownship, ['class' => 'form-control', 'id'=>'ownship']) !!}
                  
        </div>
    </div>

<div class="row">
    <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"> @lang($button_name) </button>    
            @include('pa._button')    
    </div>
</div>
{{ Form::hidden('policy_id', $member->policy_id, array('id' => 'policy_id')) }}

@section('js')
    <script src="/js/jquery-ui.js"></script>    
    <script>
        $(document).ready(function(){
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

              
            $('#ownship').change(function () {
                
            var ownship = $('#ownship').val();
                var policy_id = $('#policy_id').val();
                
                $.ajax({
                    url:" {{ route('ajax.insured') }}",
                    method:'GET',
                    data: {ownship:ownship, policy_id:policy_id},
                    dataType:'json',
                    success:function(member){
                        
                        $('#insured_name').val(member.insured_name);
                        $('#dob').val(member.dob);
                        $('#insured_id').val(member.insured_id);
                        //Gender
                        $('input[name=gender]').removeAttr('checked');
                        $("input[name=gender][value=" + member.gender + "]").prop('checked',true);
                        
                    }               
                });
            });
        });        
        jQuery.validator.methods["date"] = function (value, element) { return true; }
    </script>
@endsection   