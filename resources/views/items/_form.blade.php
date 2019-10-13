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
    <div class="col-sm-6">
            <label for="item_tabl">Table</label>    
            {!! Form::text('item_tabl', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-6">
            <label for="item_item">Item Code</label>
            {!! Form::text('item_item', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>

<div class="form-group row">
    <div class="col-sm-12">
            <label for="short_desc">Short Desc</label>    
            {!! Form::text('short_desc', null, ['class' => 'form-control']) !!}    
    </div>
    
</div>
<div class="form-group row">
    <div class="col-sm-12">
            <label for="long_desc">Long Desc</label>
            {!! Form::textarea('long_desc', null, ['class' => 'form-control', 'rows' => '3']) !!}    
    </div>
    
</div>
<div class="row">
    <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"> {{ $button_name }} </button>        
    </div>
</div>
