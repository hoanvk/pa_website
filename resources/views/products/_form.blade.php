@section('css')
<link href="/css/app.css" rel="stylesheet">
@endsection
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
        <label for="product_type">Product Type</label>
        {!! Form::select('product_type', $product_type,null, ['class' => 'form-control']) !!}
    </div>
    
</div>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="agent_id">Agent (Default)</label>
        {!! Form::select('agent_id', $agents,null, ['class' => 'form-control']) !!}
    </div>
    
</div>
{{-- <input type="text" id="datetimepicker1" />
<input type="text" id="datetimepicker2" />
<button id="image_button">OK</button>
<input type="text" id="datetimepicker3" /> --}}

<button type="submit" class="btn btn-primary"> {{ $button_name }} </button>
@section('js')
<script src="/js/app.js"></script>
<script>

    $(document).ready(function(){
    //     $("#datetimepicker2").inputmask("99-9999999");
    //     $("#datetimepicker1").datetimepicker({
    //         timepicker:false,           
    //         format:'d/m/Y',
    //         mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
    //         formatMask:'39/19/9999',
    //         minDate:0
    //     });
    //     jQuery('#image_button').click(function(){
    //         jQuery('#datetimepicker1').datetimepicker('show'); //support hide,show and destroy command
    //     });
    //     $("#datetimepicker3").inputmask("datetime", {
    //     inputFormat: "dd/mm/yyyy",
    //     outputFormat: "mm-yyyy-dd",
    //     inputEventOnly: true
    // });
    });
    
</script>

@endsection