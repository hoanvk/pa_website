<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    
    @yield('css')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>    
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('travel.index') }}">Travel Insurance </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('items.index') }}">Dash Board <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            
        </div>
    </nav>
   
    <div class="container-fluid" style="margin-top:20px">
        <div class="row">
            <div class="col-md-3">
                    
                    
                <div class="list-group">
                    <a href="{{ route('items.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/items*') ? 'active' : '' }}">Table and Codes</a>                    
                    <a href="{{ route('permissions.index')}} " class="list-group-item list-group-item-action {{ request()->is('admin/permissions*') ? 'active' : '' }}">Permissions</a>
                    <a href="{{ route('roles.index')}} " class="list-group-item list-group-item-action {{ request()->is('admin/roles*') ? 'active' : '' }}">Roles</a>
                    <a href="{{ route('users.index')}} " class="list-group-item list-group-item-action {{ request()->is('admin/users*') ? 'active' : '' }}">Users</a>
                </div>
                <br>
                <div class="list-group">
                    <a href="{{ route('products.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/products*') ? 'active' : '' }}">Products</a>
                    <a href="{{ route('autonumbers.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/autonumbers*') ? 'active' : '' }}">Product Number</a>
                    <a href="{{ route('agents.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/agents*') ? 'active' : '' }}">Agents</a>
                    <a href="{{ route('destinations.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/destinations*') ? 'active' : '' }}">Destinations</a>
                    <a href="{{ route('dayranges.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/dayranges*') ? 'active' : '' }}">Day Ranges</a>
                    <a href="{{ route('plans.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/plans*') ? 'active' : '' }}">Plans</a>
                </div>
                <br>
                <div class="list-group">
                        <a href="{{ route('agentplans.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/agentplans*') ? 'active' : '' }}">Agent Plan</a>
                        <a href="{{ route('prices.index')}}" class="list-group-item list-group-item-action {{ request()->is('*/prices*') ? 'active' : '' }}">Prices List</a>
                        <a href="{{ route('cashes.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/cashes*') ? 'active' : '' }}">Balance</a>                    
                        
                    </div>
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