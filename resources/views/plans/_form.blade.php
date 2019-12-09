
<div class="form-group row">
        <div class="col-sm-6">
                <label for="title">Title</label>    
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
                <label for="name">Name</label>    
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        
    </div>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="product_id">Product</label>
        {!! Form::select('product_id', $products,null, ['class' => 'form-control']) !!}
    </div>
    
</div>



<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>