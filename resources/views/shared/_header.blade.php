
<nav class="navbar navbar-expand-md navbar-light headerMSIG ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="navbar-collapse collapse dual-nav order-1 order-md-0">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('travel.create') }}">Travel Easy</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ route('pa.create') }}">Personal Accident</a>
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
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Vietnamese</a>
                  </li>
                </ul>
              </div>
        
      </nav>


          