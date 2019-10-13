@extends('shared.master')
@section('title')
    Update
@endsection
@section('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">

{{-- <link rel="stylesheet" href="/css/themes/smoothness/jquery-ui.theme.css"> --}}
@endsection
@section('content')
<div class="container">
    
    <div class="row">
            <div class="col-sm-4">               
                    @include('travel._help')
            </div>
            <div class="col-sm-8">
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-left"><h2>Quotation - Edit</h2></div>
                            <div class="pull-right"><a href="{{ route('travel.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
                                Back to Index</a></div>
                            </div>
                        </div>
                    
               
                
                    {!! Form::model($model, array('route' => array('travel.update', $model->id), 'method'=>'PUT')) !!}
                    {{-- {!! Form::open([
                        'route' => ['item.update',$model->id],
                        'method' => 'PUT'
                    
                    ]) !!} --}}
                    
                     
                    <!-- TODO: This is for server side, there is another version for browser defaults -->
                    {{-- <form action="{{ route('article.store') }}" method="POST">
                            {{ csrf_field() }} --}}
                        @include('travel._form',[ 'button_name' => 'Update'])
                    {{-- </form> --}}
                    {!! Form::close() !!}    
            </div>

        </div>   
   
  
@endsection
@section('js')
    <script src="/js/jquery-ui.js"></script>    
    <script>
        $("#start_date").datepicker({
                dateFormat: "dd/mm/yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""
            });
            $('#start_picker').click(function(){
            $('#start_date').datepicker('show');
            });
       

        $("#end_date").datepicker({
                dateFormat: "dd/mm/yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""
            });
            $('#end_picker').click(function(){
            $('#end_date').datepicker('show');
            });
        jQuery.validator.methods["date"] = function (value, element) { return true; }
    </script>
@endsection 