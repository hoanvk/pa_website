
<div class="form-group row">
    <div class="col-sm-6">
        <label for="product_id">Product</label>
        {!! Form::select('product_id', $products,null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
    <div class="col-sm-3">
            <label for="start_number">Start Number</label>    
            {!! Form::input('number', 'start_number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-3">
        <label for="end_number">End Number</label>    
        {!! Form::input('number', 'end_number', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
            <label for="last_number">Last Number</label>    
            {!! Form::input('number', 'last_number', null, ['class' => 'form-control']) !!}
    </div>
    
</div>


<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>