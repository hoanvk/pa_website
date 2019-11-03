@extends('dashboard.master')
@section('title')
    Benefit
@endsection
@section('content')
<div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @include('dashboard._formheader',['title'=>$product->title,'action'=>'benefits.create', 'button'=>'Create New',
        'parameter'=>$product->id])
    
    <table class="table">
        <thead>
            <tr>
                {{-- <th>Title</th> --}}
                <th>Name</th>
                <th>Title</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                {{-- <td scope="row">{{ $item->title }}</td> --}}
                <td>{{ $item->name}} </td>
                <td>{{ $item->title}} </td>
                
                <td><a href="{{  route('benefits.show', ['product_id'=>$item->product_id, 'id'=>$item->id]) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    
@endsection