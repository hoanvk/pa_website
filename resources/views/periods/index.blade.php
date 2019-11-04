@extends('dashboard.master')
@section('title')
Period
@endsection
@section('content')

        
    @include('dashboard._formheader',['title'=>'Index','action'=>'periods.create', 'parameter'=>$product->id, 'button'=>'Create New'])
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong>{{ $message }}
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
                <td><a href="{{  route('periods.show', ['product_id'=> $product->id, 'id'=> $item->id]) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
     {!! $model->links() !!}
   
@endsection