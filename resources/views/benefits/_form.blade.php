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
    
    <div class="col-md-6">
            <label for="name">Name</label>   
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div> 
    
</div>
<div class="form-group row">
     
    <div class="col-md-6">
            <label for="title">Title</label>   
            {!! Form::textarea('title', null, ['class' => 'form-control']) !!}
    </div>
    
</div>


<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>