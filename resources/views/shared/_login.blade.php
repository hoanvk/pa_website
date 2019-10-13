<div class="card">
        <div class="card-header bg-primary">DASHBOARD</div>
        <div class="card-body">
                @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @else
                Hello {{ Auth::user()->name }}, 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    <a class="card-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                
                    
                @endguest
            <div class="pull-left"></div>
            <div class="pull-right"></div>
               
        </div> 
        
        
</div>
<br>
