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