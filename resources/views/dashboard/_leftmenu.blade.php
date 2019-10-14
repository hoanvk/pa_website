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
        <a href="{{ route('promotions.index')}}" class="list-group-item list-group-item-action {{ request()->is('admin/promotions*') ? 'active' : '' }}">Promotion</a>                    
        
    </div>