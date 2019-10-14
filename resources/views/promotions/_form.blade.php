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
                <label for="promo_code">@lang('promotions.promo_code')</label>    
                {!! Form::text('promo_code', null, ['class' => 'form-control']) !!}
        </div>
        
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
                <label for="start_date">@lang('promotions.start_date')</label>
                        <div class="input-group">
                                {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'id'=>'start_date']) !!}
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary picker" id="start_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                        
                                    </div>
                        </div> 
        </div>                
                
        <div class="col-sm-6">
        
                <label for="end_date">@lang('promotions.end_date')</label>
                <div class="input-group">
                        {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'id'=>'end_date']) !!}
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary picker" id="end_picker"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                
                            </div>
                </div> 
            
            </div>                
    </div>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="product_id">@lang('promotions.product')</label>
        {!! Form::select('product_id', $products,null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
    
    <div class="col-sm-3">
            <label for="discount">@lang('promotions.discount')</label>    
            {!! Form::input('number', 'discount', null, ['class' => 'form-control']) !!}
    </div>
</div>


<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>