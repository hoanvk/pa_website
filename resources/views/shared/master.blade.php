<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="/css/msig.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('css')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>    
</head>
<body>
    <div class="page">
            @include('shared._header')
            {{-- @include('shared._banner') --}}
            @include('shared._jumbotron')
    
                  {{-- @include('shared.navbar') --}}
    
    
    
        <div class="main" style="margin-top: 15px">
            <div class="container-fluid">
                    @hasSection ('login')
                    <div class="row">
                        <div class="col-lg-12">
                                @section('login')
                                            @show
                                
                        </div>
                        
                    </div>
                    @endif
                @hasSection ('content-fluid')
                <div class="row">
                    <div class="col-lg-12">
                            @section('content-fluid')
                                        @show 
                            
                    </div>
                    
                </div>
                @endif

                @hasSection ('left-menu')
                <div class="row">
                        <div class="col-lg-4">  
                                       
                            @section('left-menu')
                            @show
                            <br />
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header bg-primary header-title">@yield('title') </div>
                                <div class="card-body">
                                    @section('content')
                                    @show
                                </div>
                            </div>  
                        </div>
                    </div>
                @endif
                
            </div>          
            
                
        </div>
        @include('shared._footer')
        
        </div>
    
    @yield('js')
</body>
</html>