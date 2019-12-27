@extends('shared.master')
@section('title')
    Policy Search
@endsection

    <div class="table-responsive">
            <table class="table">
                    <thead>
                        <tr>
                            <th>Quotation No</th>
                            <th>Policy No</th>
                            <th>Plan</th>
                            <th>Destination</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Policy type</th>
                            <th>Premium</th>
                            <th>Status</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($model as $item)
                        
                        
                        <tr>
                            <td>{{ $item->quotation_no}} </td> 
                            <td>{{ $item->policy_no}} </td>                            
                            <td>{{ optional($plans->firstWhere('id', '=', $risk->plan_id))->title }}</td>
                            <td>{{ optional($periods->firstWhere('id', '=', $item->period_id))->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->start_date)) }} </td>
                            <td>{{ date('d-m-Y', strtotime($item->end_date)) }} </td>
                            <td>{{ $risk->policy_type}} </td>
                            <td>{{ $item->premium}} </td>
                            <td>{{ $item->status}} </td>
                            
                            
                        </tr>
                       
                        
                        @endforeach
                    </tbody>
                </table>   
    </div>
    
    {!! $model->links() !!}
@endsection