@extends('dashboard.master')
@section('title')
    Plan
@endsection
@section('content')
<div class="clearfix mb-2">
    
        <span class="float-right"><a class="btn btn-primary" href="{{route('plans.create')}} ">Create New</a></span>
      </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Title</th>
                <th>Name</th>
                <th>Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->product->title }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->id}} </td>
                <td><a href="{{  route('plans.show', $item->id) }} "><i class="fas fa-edit" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    {!! $model->links() !!}
@endsection