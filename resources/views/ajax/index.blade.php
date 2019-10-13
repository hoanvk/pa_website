@extends('dashboard.master')
@section('title')
    Table Setup
@endsection
@section('content')
<div class="container">
    
    <h2>Index</h2>
    
    <p><div class="form-group">
        
        <input type="text" name="name" id="search" class="form-control" placeholder="placeholder">
        
    </div></p>
    <table class="table">
        <thead>
            <tr>
                <th>Table</th>
                <th>Item</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>   
    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            fetch_item_data();

            function fetch_item_data(search='') {
                $.ajax({
                    url:" {{ route('ajax.action') }}",
                    method:'GET',
                    data: {query:search},
                    dataType:'json',
                    success:function(data){
                        $('tbody').html(data.table_data);
                        
                    }
                })
            }
            $('#search').keyup(function () {
               var query = $(this).val();
               fetch_item_data(query);
            });
        });
    </script>
@endsection