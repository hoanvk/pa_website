@extends('shared.master')
@section('title')
    Insured Person
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    INSURED PERSON
@endsection
@section('content')
@include('pa._tabs')
                    
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
                    $policy->id, $member->id), 'method'=>'DELETE')) !!}
            
                <a class="btn btn-outline-primary" href="{{route('members.edit',
                    ['policy_id'=>$policy->id, 'id'=>$member->id])}} ">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!} 
            
        </p>
        @include('members._insured')
    
@endsection