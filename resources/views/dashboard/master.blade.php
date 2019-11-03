<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') | MSIG</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    
    @yield('css')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>    
</head>
<body>
    @include('dashboard._navbar')
   
    <div class="container-fluid" style="background-color:#fff; padding-top:15px">
        <div class="row">
            <div class="col-md-3">
                    
                    
                @include('dashboard._collapse')
            </div>
            <div class="col-md-9">
                @section('content')
                @show
            </div>
        </div>
        
    </div>
    @yield('js')
</body>
</html>