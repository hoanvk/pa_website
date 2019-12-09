
<div class="form-group row">
    
        <div class="col-md-6">
                <label for="name">Name</label>   
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div> 
        
    </div>
<div class="form-group row">
     
    <div class="col-md-6">
            <label for="title">Title</label>   
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
</div>


    <div class="form-group row">
            <div class="col-sm-3">
                    
                    <label for="qty">Quantity</label>    
                    {!! Form::input('number', 'qty', null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3">
                    <label for="unit">Unit</label>
                    {!! Form::select('unit', $units,null, ['class' => 'form-control']) !!}
                </div>
        </div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>