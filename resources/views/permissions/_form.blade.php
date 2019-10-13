<div class="form-group">
    <label for="title">Title</label>    
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="name">Name</label>    
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>