<div class="form-group row">
    <div class="col-sm-6">
            <label for="title">Title</label>    
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
    <div class="col-sm-3">
            <label for="day_from">From</label>    
            {!! Form::input('number', 'day_from', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-3">
            <label for="day_to">To</label>    
            {!! Form::input('number', 'day_to', null, ['class' => 'form-control']) !!}
    </div>
</div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>