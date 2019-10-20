@extends('dashboard.master')
@section('title')
Period | MSIG
@endsection
@section('content')
<div class="container">
        
    @include('dashboard._formheader',['title'=>'Index','action'=>'periods.create', 'button'=>'Create New'])
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->title }}</td>
                <td>{{ $item->name}} </td>
                <td>{{ $item->product->title}} </td>
                <td>{{ $item->qty}} </td>
                <td>{{ $item->unit}} </td>
                <td><a href="{{  route('periods.show', $item->id) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
     {!! $model->links() !!}
@endsection