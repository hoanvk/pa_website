@include('dashboard._breadcrumb',['nodes' =>[['action'=>'agents.index', 'title'=>'Index'], 
        ['title'=>'Details']]])

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
                        <label for="name">Agent Number</label>    
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
            </div>
                        
<div class="form-group row">
    <div class="col-sm-6">
            <label for="title">Title</label>    
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
                <div class="col-sm-6">
                        <label for="client_no">Client Number</label>    
                        {!! Form::text('client_no', null, ['class' => 'form-control']) !!}
                </div>
                
            </div>
<div class="form-group row">
    <div class="col-sm-3">
            <label for="email">Email</label>    
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-3">
            <label for="taxnum">Tax Number</label>    
            {!! Form::text('taxnum', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
            <label for="address">Address</label>    
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5']) !!}
    </div>
    
</div>
<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>