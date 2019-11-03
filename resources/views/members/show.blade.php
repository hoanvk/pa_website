@extends('shared.master')
@section('title')
    Insured Person
@endsection
@section('left-menu')
    @include('pa._policy')
    
    @include('pa._help')
@endsection
@section('caption')
    @lang('members.insured_person')
@endsection
@section('content')

@include('pa._status')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif             
        <table class="table">
            <tbody>
            
                <tr>
                    <td scope="row">@lang('members.name')</td>
                    <td>{{ $member->insured_name }}</td>
                    
                </tr>
                <tr>
                    <td scope="row">@lang('members.dob')</td>
                    <td>{{ date('d/m/Y', strtotime($member->dob)) }}</td>
                    
                </tr>
                <tr>
                        <td>@lang('members.age')</td>                
                        <td>{{ $member->age }}</td>
                    </tr>
                <tr>
                    <td scope="row">@lang('members.identity')</td>                
                    <td>{{ $member->insured_id }}</td>
                </tr>
                <tr>
                    <td scope="row">@lang('members.gender')</td>                
                    <td>{{ optional($gender->firstWhere('item_item','=',$member->gender))->long_desc }}</td>
                </tr>
                <tr>
                        <td scope="row">@lang('members.relationship')</td>                
                        <td>{{ optional($relationship->firstWhere('item_item','=',$member->ownship))->long_desc }}</td>
                    </tr>
                <tr>
                        <td>@lang('members.nationality')</td>                
                        <td>{{ $member->naty }}</td>
                    </tr>
            </tbody>
        </table>   
        <p>
                {!! Form::model($member, array('route' => array('members.destroy', 
                    $policy->id, $member->id), 'method'=>'DELETE')) !!}
            
                <a class="btn btn-outline-primary" href="{{route('members.edit',
                    ['policy_id'=>$policy->id, 'id'=>$member->id])}} ">@lang('members.edit')</a>
                <button type="submit" class="btn btn-danger">@lang('members.delete')</button>
                
                {!! Form::close() !!} 
            
        </p>
        @include('members._insured')
        @include('pa._button')
@endsection