
<nav class="navbar navbar-expand-md navbar-light headerMSIG ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="navbar-collapse collapse dual-nav order-1 order-md-0">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">  
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">@lang('shared.travel_easy')</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="nav-link dropdown-item" href="{{ route('travel.create')}}">@lang('shared.travel_easy')</a>
                          <a class="nav-link dropdown-item" href="{{ route('pa.create') }}">@lang('shared.oneday_PA')</a>
                        </div>
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
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{$languages->where('item_item','==',\Session::get('locale'))->first()->short_desc}} </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @foreach ($languages->where('item_item','!=',\Session::get('locale')) as $language)
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


          