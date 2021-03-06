<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.html">Start Admin</a>
    
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i>
        </button>
    
        <!-- Navbar Search -->
        <div class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
        {{-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> --}}
    
        
        <ul class="navbar-nav ml-auto ml-md-0">
          
          <!-- Languages -->
        @if (isset($languages))
        @php
          $curr_lang = '';
            foreach ($languages as $language) {
              # code...
              if ($language['item_item']===Config::get('app.locale')) {
                # code...
                $curr_lang =$language['short_desc'];
              }
            }
        @endphp
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-globe"></i>
              {{$curr_lang}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
              @foreach ($languages as $language)
                @if ($language['item_item'] !=Config::get('app.locale'))
                  <a class="dropdown-item" href="{{ '/locale/'.$language['item_item']}}">{{$language['short_desc']}}</a>
                @endif    
              @endforeach
              
            </div>
        </li>  
    
    @endif
          <!-- User -->
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        
    @else
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>{{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/change-password">Change Password</a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/change-password" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
        
    @endguest
        </ul>
    
      </nav>
     
