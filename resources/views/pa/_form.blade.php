@section('css')
<link href="/css/app.css" rel="stylesheet">

@endsection
@include('pa._status')
@include('shared._message')
<div class="form-group row">
        <div class="col-sm-6">
                <label for="plan_id">@lang('pa.plan')</label>
                {!! Form::select('plan_id', $plans,null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="col-sm-6">
                <label for="start_date">@lang('pa.from_date') </label>
                <div class="input-group">
                        {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'id'=>'start_date']) !!}
                        <div class="input-group-append">
                        <button type="button" class="btn btn-primary picker" id="start_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                
                        </div>
                </div> 
        </div>   
</div>


    <div class="form-group row">
                         
            <div class="col-sm-6">
                        <label for="period_id">@lang('pa.period') </label>
                        {!! Form::select('period_id', $periods,null, ['class' => 'form-control', 'id'=>'period_id']) !!}
                </div>        
            <div class="col-sm-6">
            
                    <label for="end_date">@lang('pa.to_date') </label>
                    <div class="input-group">
                            {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'id'=>'end_date','disabled'=>'"disabled"']) !!}
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary picker" id="end_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                    
                                </div>
                    </div> 
                
                </div>                
        </div> 
      <div class="row">
                <div class="col-sm-6">
                        <label for="promo_code">@lang('pa.promo_code') </label>
                        {!! Form::text('promo_code', null, ['class' => 'form-control']) !!}    
                </div>
      </div>   
      <div class="mt-3">
        
        @if ((!isset($policy)) || $policy->status < 5)
        <button type="submit" class="btn btn-primary"> @lang($button_name) </button>
        @endif
            
        @include('pa._button') 
      </div>
      

      @section('js')
       
      <script>
          $(document).ready(function(){
            $("#start_date").datetimepicker({
                timepicker:false,           
                format:'d/m/Y',
                mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
                formatMask:'39/19/9999',
                minDate:0
            });
            jQuery('#start_picker').click(function(){
                jQuery('#start_date').datetimepicker('show'); //support hide,show and destroy command
            });
            //   $("#start_date").datepicker({
            //       dateFormat: "dd/mm/yy",
            //       firstDay: 1,
            //       isRTL: false,
            //       showMonthAfterYear: false,
            //       yearSuffix: ""
            //   });
            //   $('#start_picker').click(function(){
            //       $('#start_date').datepicker('show');
            //   });
         
  
              
              
  
              function fetch_item_data() {
                 
                var period_id = $('#period_id').val();
                  var start_date = $('#start_date').val();
                  $.ajax({
                      url:" {{ route('ajax.period') }}",
                      method:'GET',
                      data: {start_date:start_date, period_id:period_id},
                      dataType:'json',
                      success:function(data){
                        //   alert(data.end_date);
                          $('#end_date').val(data.end_date);
                          
                      }
                  })
              }
              $('#period_id').change(function () {
                  
                  fetch_item_data();
              });
              $('#start_date').change(function () {
                  
                  fetch_item_data();
              });
          });
        //   jQuery.validator.methods["date"] = function (value, element) { return true; }
      </script>
      
  @endsection    