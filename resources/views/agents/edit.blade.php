@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
<div class="container">
    
       
        
        <div class="row">
            <div class="col-sm-12">
                 <div class="pull-left"><h2>Update</h2></div>
                 <div class="pull-right"><a href="{{ route('agents.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
                    Back to Index</a></div>
            </div>

        </div>
        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($model, array('route' => array('agents.update', $model->id), 'method'=>'PUT')) !!}
                {{-- {!! Form::open([
                    'route' => ['item.update',$model->id],
                    'method' => 'PUT'

                ]) !!} --}}

                 
                <!-- TODO: This is for server side, there is another version for browser defaults -->
                {{-- <form action="{{ route('article.store') }}" method="POST">
                        {{ csrf_field() }} --}}
                    @include('agents._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}  
@endsection