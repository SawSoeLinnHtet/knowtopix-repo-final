<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">KnowTopix</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">
                <img src="{{ asset('site/img/logo.png') }}" width="100%" height="100%" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown @if (Request::route('admin.dashboard')) {{'active'}} @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Office</li>
            <li class="dropdown @if (Request::routeIs('admin.staffs.*')) {{'active'}} @endif">
                <a href="{{ route('admin.staffs.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Staff</span></a>
            </li>
            <li class="menu-header">Site</li>
            <li class="dropdown @if (Request::routeIs('admin.users.*')) {{'active'}} @endif">
                <a href="{{ route('admin.users.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li>
            <li class="dropdown @if (Request::routeIs('admin.posts.*')) {{'active'}} @endif">
                <a href="{{ route('admin.posts.index') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Posts</span></a>
            </li>
            <li class="menu-header">Social</li>
            <li class="dropdown @if (Request::routeIs('admin.friends.index')) {{'active'}} @endif">
                <a href="{{ route('admin.friends.accepted') }}" class="nav-link"><i class="fas fa-users"></i><span>Friends</span></a>
            </li>
            <li class="dropdown @if (Request::routeIs('admin.friends.pending')) {{'active'}} @endif">
                <a href="{{ route('admin.friends.pending') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Pending</span></a>
            </li>
            <li class="menu-header">Site</li>
            <li class="dropdown @if (Request::routeIs('admin.blogs.*')) {{'active'}} @endif">
                <a href="{{ route('admin.blogs.request') }}" class="nav-link"><i class="fas fa-users"></i><span>Blogs</span></a>
            </li>
            <li class="dropdown @if (Request::routeIs('admin.categories.*')) {{'active'}} @endif">
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Categories</span></a>
            </li>
        </ul>    
    </aside>
</div>