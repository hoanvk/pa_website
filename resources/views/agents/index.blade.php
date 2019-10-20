@extends('dashboard.master')
@section('title')
    Agent
@endsection
@section('content')

        @include('dashboard._formheader',['title'=>'Index','action'=>'agents.create', 'button'=>'Create New'])
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>Success!</strong>
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                    <th>Agent Number</th>
                <th>Title</th>
                <th>Client Number</th>
                <th>Tax Number</th>
                <th>Email</th>
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                    <td>{{ $item->name}} </td>
                <td scope="row">{{ $item->title }}</td>
                <td>{{ $item->client_no}} </td>
                <td>{{ $item->taxnum}} </td>
                <td>{{ $item->email}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('agents.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection