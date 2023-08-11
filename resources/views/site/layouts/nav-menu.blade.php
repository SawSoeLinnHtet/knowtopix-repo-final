<ul>
    <li class="{{ Request::routeIs('site.index') ? 'active' : '' }}">
        <a href="{{ route('site.index') }}">
            <i class="fa-solid fa-house"></i><span class="ms-3">Home</span>
        </a>
    </li>
    <li class="{{ Request::routeIs('site.search.index') ? 'active' : '' }}">
        <a href="{{ route('site.search.index') }}">
            <i class="fa-solid fa-magnifying-glass"></i><span class="ms-3">Search</span>
        </a>
    </li>
    <li class="{{ Request::routeIs('site.blog.index') ? 'active' : '' }}">
        <a href="{{ route("site.blog.index") }}">
            <i class="fa-solid fa-flag"></i><span class="ms-3">Blogs</span>
        </a>
    </li>
    <li class="{{ Request::routeIs('site.friend.*') ? 'active' : '' }}">
        <a href="{{ route('site.friend.index') }}">
            <i class="fa-solid fa-users"></i><span class="ms-3">Friends</span>
        </a>
    </li>
</ul>