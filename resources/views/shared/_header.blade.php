

<nav class="navbar navbar-expand-lg headerMSIG ">
        <a class="navbar-brand mw-75" href="{{route('travel.create')}}">
            
            <img src="{{ asset('images/banner/logo-horizontal-with-tagline.png') }}" alt="MSIG Vietnam" class="header-logo img-fluid">
        </a>
        <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                </ul>
        
                <div class="btn-group px-1 mr-1 mt-lg-0 mt-2">
                        <a href="https://www.facebook.com/msigvietnam/" target="_blank" class="btn btn-msig-blue pill">
                            <i class="fa fa-facebook mr-1"></i>
                            Theo dõi trang Facebook</a>
                        
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                <div class="btn-group px-1 mt-lg-0 mt-2 mb-lg-0 mb-2">
                        <div class="btn-group">
                            <a href="#" class="btn pill btn-outline-msig-white">EN</a>
                            <a href="#" class="btn pill btn-msig-red">VN</a>
                                
                                </div>
                        </div>
                                    
            </div>
            
</nav>

          