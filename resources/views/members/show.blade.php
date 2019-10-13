@extends('shared.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    <div class="row">
            <div class="col-sm-4">               
                    @include('travel._policy')
                </div>
    
                <div class="col-sm-8">
                    <div class="pull-left"><h2>Details</h2></div>
        
        <div class="pull-right"><a href="{{ route('members.index',$policy_id)}} " class="btn btn-link"><i class="fa fa-chevron-left"></i> Back to Index</a></div>
        
        <table class="table">
            <tbody>
            
                <tr>
                    <td scope="row">Full name</td>
                    <td>{{ $member->insured_name }}</td>
                    
                </tr>
                <tr>
                    <td scope="row">Date of birth</td>
                    <td>{{ date('d/m/Y', strtotime($member->dob)) }}</td>
                    
                </tr>
                <tr>
                        <td>Age</td>                
                        <td>{{ $member->age }}</td>
                    </tr>
                <tr>
                    <td scope="row">ID/Passport</td>                
                    <td>{{ $member->insured_id }}</td>
                </tr>
                <tr>
                    <td scope="row">Gender</td>                
                    <td>{{ optional($gender->firstWhere('item_item','=',$member->gender))->long_desc }}</td>
                </tr>
                <tr>
                        <td scope="row">Relationship</td>                
                        <td>{{ optional($relationship->firstWhere('item_item','=',$member->ownship))->long_desc }}</td>
                    </tr>
                <tr>
                        <td>Nationality</td>                
                        <td>{{ $member->naty }}</td>
                    </tr>
            </tbody>
        </table>   
        <p>
                {!! Form::model($member, array('route' => array('members.destroy', 
                    $policy_id, $member->id), 'method'=>'DELETE')) !!}
            
                <a class="btn btn-primary" href="{{route('members.edit',
                    ['policy_id'=>$policy_id, 'id'=>$member->id])}} ">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!} 
            
        </p>
        @include('members._insured')
    </div>
    </div>
        
</div>
@endsection