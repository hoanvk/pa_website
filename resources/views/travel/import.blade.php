@extends('shared.master')
@section('title')
    Import Policy
@endsection
@section('content')
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="pull-left"><h2>Import</h2></div>  
        <div class="pull-right"><a href="{{ route('travel.index')}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Back to Index</a></div>
                </div>
            </div>
    <form action="{{ route('travel.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6">
                    <label for="file">Browse the import policy file:</label>
                    <input type="file" name="file" class="form-control">
            </div>
                
    </div>
       
        <button class="btn btn-success">Import Policy</button>
        
    </form>
</div>
@endsection