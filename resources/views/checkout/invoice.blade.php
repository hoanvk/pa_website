@extends('shared.master')
@section('title')
Payment
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('pa.checkout')
@endsection

@section('content')
 
      
@include('pa._status')
{!! Form::open([
    'route' => ['checkout.store',$policy->id],
    'method' => 'POST'
  
  ]) !!}
  
@include('shared._message')
<h4 class="mt-2">@lang('invoices.payment_method')</h4>
<div class="form-group row">
  <div class="ml-3">
    <div class="custom-control custom-radio">
            {!! Form::radio('payment_method', 'I',true, ['class' => 'custom-control-input','id'=>'customRadio1']) !!}                
            <label class="custom-control-label" for="customRadio1">@lang('invoices.international') </label>
        </div>
        <div class="custom-control custom-radio">
            {!! Form::radio('payment_method', 'D',false, ['class' => 'custom-control-input','id'=>'customRadio2']) !!}                
            <label class="custom-control-label" for="customRadio2"> @lang('invoices.domestic')</label>
        </div>
</div>
</div>
<h4 class="mt-4">@lang('invoices.information')</h4>
<div class="form-group row">
  <label for="inv_name" class="col-md-4 col-form-label text-md-right">@lang('invoices.name')</label>   
    <div class="col-sm-8">
             
            {!! Form::text('inv_name', $invoice->inv_name, ['class' => 'form-control']) !!}    
    </div>
    
</div>
<div class="form-group row">
  <label for="inv_taxcode" class="col-md-4 col-form-label text-md-right">@lang('invoices.tax_code') </label>    
<div class="col-sm-8">
    
    {!! Form::text('inv_taxcode', $invoice->inv_taxcode, ['class' => 'form-control']) !!}    
</div>


</div>
<div class="form-group row">
  <label for="inv_address" class="col-md-4 col-form-label text-md-right">@lang('invoices.address') </label>   
    <div class="col-sm-8">
             
            {!! Form::text('inv_address', $invoice->inv_address, ['class' => 'form-control']) !!}    
    </div>
    
</div>     

<h4 class="mt-4">@lang('invoices.term_of_use')</h4>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="term_of_use" name="example1">
  <label class="custom-control-label" for="term_of_use">I have read, understand and accept the <b>Terms of Use</b> and the <b>Privacy Policy</b> of the website and the Terms & Conditions of the <b>Policy Wording</b>.
    I hereby acknowledge that the insurance liability of MSIG VN shall only arise after I have fully paid the premium(s) prescribed in the insurance contract entered into between I and MSIG Vietnam.
    
    I ensure and confirm that all the information provided is truthful, sufficient and accurate. I shall take full responsibility before the law for all the information provided and understand that MSIG Vietnam shall not be liable for any loss or damage, whether being direct or indirect, caused by insufficient provision of information and/or inaccurate information.
  </label>
</div>
   <div class="mt-2">
    <button type="submit" class="btn btn-danger"  disabled id="btnBuy">@lang('pa.checkout')</button>
    @include('pa._button')
   </div>
  
  {!! Form::close() !!}         
    


@endsection
@section('js')
    <script>
      $(document).ready(function(){
        $("#term_of_use").change(function() {
            if(this.checked) {
                //Do stuff
              $('#btnBuy').prop('disabled', false);               
            }
            else{
              $('#btnBuy').prop('disabled', true);               
            }
        });   
      // jQuery methods go here...

      });
    </script>

@endsection