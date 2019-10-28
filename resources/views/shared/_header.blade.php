
<nav class="navbar navbar-expand-md navbar-light headerMSIG ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="navbar-collapse collapse dual-nav order-1 order-md-0">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">  
                      @if (isset($links))
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ $links->where('active','==','active')->first()->title}} </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach ($links->where('active','!=','active') as $link)
                          <a class="nav-link dropdown-item" href="{{ route($link->route)}}">{{$link->title }} </a>
                        @endforeach
                        
                        
                      </div>
                      @else
                          
                      @endif
                        
                      </li> 
                  
                </ul>
              </div>
            
              <a href="{{route('travel.create')}}" class="navbar-brand mx-auto order-0 order-md-2 p-2">
                    <img src="{{ asset('images/banner/msig_logo.png') }}" alt="MSIG Vietnam" class="header-logo img-fluid">
                </a>
            
              <div class="navbar-collapse collapse dual-nav order-4 order-md-4 justify-content-end">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                  </li>
                  @if (isset($languages))
                  
                  <li class="nav-item dropdown">  
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{$languages->where('item_item','==',Config::get('app.locale'))->first()->short_desc}} </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @foreach ($languages->where('item_item','!=',Config::get('app.locale')) as $language)
                          <a class="nav-link dropdown-item" href="{{ '/locale/'.$language->item_item}}">{{$language->short_desc}}</a>
                          
                      @endforeach
                       
                      </div>
                    </li> 
                     @else
                     <li class="nav-item dropdown">  
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">English</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="nav-link dropdown-item" href="/locale/vi">Vietnamese</a>
                          <a class="nav-link dropdown-item" href="/locale/ja">Japanese</a>
                        </div>
                      </li> 
                    @endif
                  
                  

                </ul>
              </div>
        
      </nav>


          