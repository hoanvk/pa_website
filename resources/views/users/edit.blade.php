@extends('dashboard.master')
@section('title')
Edit
@endsection
@section('content')
<div class="container">
        <a href="{{ route('users.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Back to Index</a>
        <h2>Edit</h2>
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
                {!! Form::model($model, ['route' => ['users.update',$model->id], 'method'=>'PUT']) !!}

                 
                <!-- TODO: This is for server side, there is another version for browser defaults -->
                {{-- <form action="{{ route('article.store') }}" method="POST">
                        {{ csrf_field() }} --}}
                    @include('users._form',['button_name' => 'Edit'])
                {{-- </form> --}}
                {!! Form::close() !!}   
            </div>

        </div>
@endsection