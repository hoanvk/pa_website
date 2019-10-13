@extends('shared.master')
@section('title')
    Confirmation
@endsection
@section('content')
<div class="container" style="margin-top:60px">
    
    <table class="table">
        <tbody>
        
            <tr>
                <td scope="row">Quotation No</td>
                <td>{{ $model->quotation_no }}</td>
                
            </tr>
            <tr>
                <td scope="row">Insured Name</td>
                <td>{{ $model->insured_name }}</td>
                
            </tr>
            <tr>
                <td scope="row">Identity No</td>                
                <td>{{ $model->insured_id }}</td>
            </tr>
            <tr>
                <td scope="row">Date of birth</td>                
                <td>{{ $model->insured_dob }}</td>
            </tr>
        </tbody>
    </table>   
    <p>
        <a class="btn btn-outline-primary" href="{{route('pa.edit')}} ">Edit Quotation</a> <a class="btn btn-primary" href="{{route('pa.confirm')}} ">Confirm</a>
    </p>
@endsection