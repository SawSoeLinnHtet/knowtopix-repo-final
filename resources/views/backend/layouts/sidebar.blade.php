<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown @if (Request::is('admin/dashboard')) {{'active'}} @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Office</li>
            <li class="dropdown @if (Request::is('admin/staffs')) {{'active'}} @endif">
                <a href="{{ route('admin.staffs.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Staff</span></a>
            </li>
            <li class="menu-header">Site</li>
            <li class="dropdown @if (Request::is('admin/users')) {{'active'}} @endif">
                <a href="{{ route('admin.users.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li>
        </ul>    
    </aside>
</div>