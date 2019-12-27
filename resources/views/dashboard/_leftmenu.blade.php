@php
    //
    $show = request()->is('admin/products*')
                ||request()->is('admin/autonumbers*')
                ||request()->is('admin/agents*')
                ||request()->is('admin/destinations*')
                ||request()->is('admin/dayranges*')
                ||request()->is('admin/plans*')
                ||request()->is('admin/periods*')
                ||request()->is('admin/paprices*')
                ||request()->is('admin/benefits*')
                ||request()->is('admin/items*')
                ||request()->is('admin/permissions*')
                ||request()->is('admin/roles*')
                ||request()->is('admin/users*') ? 'show' : '';
@endphp
<ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Agent Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown {{ $show}} ">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu {{ $show}}" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Administration Page:</h6>
            <a href="{{ route('items.index')}}" class="dropdown-item {{ request()->is('admin/items*') ? 'active' : '' }}">@lang('dashboard.tb_items')</a>                    
                <a href="{{ route('permissions.index')}} " class="dropdown-item {{ request()->is('admin/permissions*') ? 'active' : '' }}">Permissions</a>
                <a href="{{ route('roles.index')}} " class="dropdown-item {{ request()->is('admin/roles*') ? 'active' : '' }}">Roles</a>
                <a href="{{ route('users.index')}} " class="dropdown-item {{ request()->is('admin/users*') ? 'active' : '' }}">@lang('dashboard.users')</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Product Page:</h6>
            <a href="{{ route('products.index')}}" class="dropdown-item {{ request()->is('admin/products*')
                    ||request()->is('admin/paprices*')
                    ||request()->is('admin/periods*')
                    ||request()->is('admin/benefits*') ? 'active' : '' }}">@lang('dashboard.products')</a>
                  <a href="{{ route('autonumbers.index')}}" class="dropdown-item {{ request()->is('admin/autonumbers*') ? 'active' : '' }}">Product Number</a>
                  <a href="{{ route('agents.index')}}" class="dropdown-item {{ request()->is('admin/agents*') ? 'active' : '' }}">@lang('dashboard.agents')</a>
                  <a href="{{ route('destinations.index')}}" class="dropdown-item {{ request()->is('admin/destinations*') ? 'active' : '' }}">Destinations</a>
                  <a href="{{ route('dayranges.index')}}" class="dropdown-item {{ request()->is('admin/dayranges*') ? 'active' : '' }}">Day Ranges</a>
                  <a href="{{ route('plans.index')}}" class="dropdown-item {{ request()->is('admin/plans*') ? 'active' : '' }}">Plans</a>
          </div>
        </li>
        <li class="nav-item {{ request()->is('admin/cashes*') ? 'active' : '' }}">
          <a href="{{ route('cashes.index')}}" class="nav-link">
                <i class="fas fa-fw fa-dollar-sign"></i>Balance
            </a>
          
        </li>
        <li class="nav-item {{ request()->is('admin/promotions*') ? 'active' : '' }}">
            <a href="{{ route('promotions.index')}}" class="nav-link">
                <i class="fas fa-fw fas fa-gift"></i>Promotion</a>
          
        </li>
        <li class="nav-item {{ request()->is('*/prices*') ? 'active' : '' }}">
            <a href="{{ route('prices.index')}}" class="nav-link">
                <i class="fas fa-fw fa-comment-dollar"></i>Travel Price
            </a>
            
        </li>
        <li class="nav-item {{ request()->is('admin/patrans*') ? 'active' : '' }}">
            <a href="{{ route('patrans.index')}}" class="nav-link">
                <i class="fas fa-fw fa-table"></i>PA Transactions</a>
        
        </li>
      </ul>
