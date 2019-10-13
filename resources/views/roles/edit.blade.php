@extends('dashboard.master')
@section('title')
    Update
@endsection
@section('content')
<div class="container">
    <a href="{{ route('roles.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i>
        Back to Index</a>
       
        <h2>Update</h2>
        <div class="row">
            <div class="col-sm-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($model, array('route' => array('roles.update', $model->id), 'method'=>'PUT')) !!}
                {{-- {!! Form::open([
                    'route' => ['item.update',$model->id],
                    'method' => 'PUT'

                ]) !!} --}}

                 
                <!-- TODO: This is for server side, there is another version for browser defaults -->
                {{-- <form action="{{ route('article.store') }}" method="POST">
                        {{ csrf_field() }} --}}
                    @include('roles._form',[ 'button_name' => 'Update'])
                {{-- </form> --}}
                {!! Form::close() !!}   
            </div>

        </div>
@endsection