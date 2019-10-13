@extends('shared.master')
@section('title')
    Quotation
@endsection
@section('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">

{{-- <link rel="stylesheet" href="/css/themes/smoothness/jquery-ui.theme.css"> --}}
@endsection
@section('content')
<div class="container" style="margin-top:60px">
    
    {{-- <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h2>Quotation</h2>
        </div>
    </div> --}}
        <div class="row">
            <div class="col-sm-3">
                <h2>Product</h2>
                <div class="col-sm-1-12">
                        <div class="card">
                                <div class="card-header">Header</div>
                                <div class="card-body">Content</div> 
                                <div class="card-footer">Footer</div>
                                </div>
                </div>
                  
            </div>
            <div class="col-sm-6">
                    <h2>Quotation</h2>
                @if (session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open([
                    'route' => ['pa.store'],
                    'method' => 'POST'

                ]) !!}

                 
                <!-- TODO: This is for server side, there is another version for browser defaults -->
                {{-- <form action="{{ route('article.store') }}" method="POST">
                        {{ csrf_field() }} --}}
                    @include('pa._form',[ 'button_name' => 'Create'])
                {{-- </form> --}}
                {!! Form::close() !!}   
            </div>

        </div>
@endsection
@section('js')
    <script src="/js/jquery-ui.js"></script>    
    <script>
        $(".datepicker").datepicker({
                dateFormat: "dd/mm/yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""
            });
            $('.picker').click(function(){
            $('.datepicker').datepicker('show');
            });
        jQuery.validator.methods["date"] = function (value, element) { return true; }
    </script>
@endsection    