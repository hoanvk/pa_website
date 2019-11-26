@extends('shared.master')
@section('title')
    Login
@endsection
@section('login')
<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom:20px;">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <table class="table">
                        
                        <tbody>
                            <tr>
                                <td scope="row">User Name</td>
                                <td>{{ $model->name}} </td>
                                
                            </tr>
                            <tr>
                                <td scope="row">Email</td>
                                <td>{{$model->email}} </td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
