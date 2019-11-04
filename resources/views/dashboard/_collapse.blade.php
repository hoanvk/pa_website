<div id="accordion">

    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
          Administration
        </a>
      </div>
      <div id="collapseOne" class="collapse {{ request()->is('admin/items*')
        ||request()->is('admin/permissions*')
        ||request()->is('admin/roles*')
        ||request()->is('admin/users*') ? 'show' : '' }}" data-parent="#accordion">
        <div class="card-body">
            <div class="list-group list-group-flush">
                <a href="{{ route('items.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/items*') ? 'active' : '' }}">@lang('dashboard.tb_items')</a>                    
                <a href="{{ route('permissions.index')}} " class="list-group-item list-group-item-action {{ request()->is('admin/permissions*') ? 'active' : '' }}">Permissions</a>
                <a href="{{ route('roles.index')}} " class="list-group-item list-group-item-action {{ request()->is('admin/roles*') ? 'active' : '' }}">Roles</a>
                <a href="{{ route('users.index')}} " class="list-group-item list-group-item-action {{ request()->is('admin/users*') ? 'active' : '' }}">@lang('dashboard.users')</a>
            </div>
        </div>
      </div>
    </div>
  
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
          Product Setup
        </a>
      </div>
      <div id="collapseTwo" class="collapse {{ request()->is('admin/products*')
        ||request()->is('admin/autonumbers*')
        ||request()->is('admin/agents*')
        ||request()->is('admin/destinations*')
        ||request()->is('admin/dayranges*')
        ||request()->is('admin/plans*')
        ||request()->is('admin/periods*')
        ||request()->is('admin/paprices*')
        ||request()->is('admin/benefits*') ? 'show' : '' }}" data-parent="#accordion">
        <div class="card-body">
            <div class="list-group list-group-flush">
                <a href="{{ route('products.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/products*')
                  ||request()->is('admin/paprices*')
                  ||request()->is('admin/periods*')
                  ||request()->is('admin/benefits*') ? 'active' : '' }}">@lang('dashboard.products')</a>
                <a href="{{ route('autonumbers.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/autonumbers*') ? 'active' : '' }}">Product Number</a>
                <a href="{{ route('agents.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/agents*') ? 'active' : '' }}">@lang('dashboard.agents')</a>
                <a href="{{ route('destinations.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/destinations*') ? 'active' : '' }}">Destinations</a>
                <a href="{{ route('dayranges.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/dayranges*') ? 'active' : '' }}">Day Ranges</a>
                <a href="{{ route('plans.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/plans*') ? 'active' : '' }}">Plans</a>
                
            </div>
        </div>
      </div>
    </div>
  
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Agent Setup
        </a>
      </div>
      <div id="collapseThree" class="collapse {{ request()->is('admin/agentplans*')
        ||request()->is('admin/prices*')
        ||request()->is('admin/cashes*')
        ||request()->is('admin/promotions*') ? 'show' : '' }}" data-parent="#accordion">
        <div class="card-body">
            <div class="list-group list-group-flush">
                <a href="{{ route('agentplans.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/agentplans*') ? 'active' : '' }}">Agent Plan</a>
                
                <a href="{{ route('prices.index')}}" class="list-group-item list-group-item-action {{ request()->is('*/prices*') ? 'active' : '' }}">Travel Price</a>
                <a href="{{ route('cashes.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/cashes*') ? 'active' : '' }}">Balance</a>                    
                <a href="{{ route('promotions.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/promotions*') ? 'active' : '' }}">Promotion</a>                    
                
                                  
            </div>
        </div>
      </div>
    </div>
  
  </div>