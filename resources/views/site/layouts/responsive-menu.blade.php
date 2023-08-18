<div class="col-12 col-lg-0 col-xl-0 d-block d-lg-none d-xl-none">
    <div class="responsive-menu-bar">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" class="{{ Request::routeIs('site.index') ? 'text-info' : '' }}">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('site.search.index') }}" class="{{ Request::routeIs('site.search.index') ? 'text-info' : '' }}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </li>
            <li>
                <a href="{{ route("site.blog.index") }}" class="{{ Request::routeIs('site.blog.index') ? 'text-info' : '' }}">
                    <i class="fa-solid fa-flag"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('site.friend.index') }}" class="{{ Request::routeIs('site.friend.*') ? 'text-info' : '' }}">
                    <i class="fa-solid fa-users"></i>
                </a>
            </li>
            <li style="position: relative;" x-data="{ openFloatProfile : false }">
                <div 
                    class="profile-float-wrapper responsive"
                    x-cloak x-show="openFloatProfile"
                    @click.away="openFloatProfile = false" 
                    x-transition:enter.duration.500ms
                    x-transition:leave.duration.400ms
                >
                    <div class="profile-float-detail pb-3">
                        <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
                        <h5 class="profile-name">
                            {{ Auth::user()->name }}
                        </h5>
                        <span class="username">
                            @ {{ Auth::user()->username }}
                        </span>
                    </div>
                    <div class="collection-wrapper">
                        <ul>
                            <li>
                                <a href="{{ route('site.profile.index', Auth::user()->username)}}">
                                    <i class="fa-solid fa-user me-3"></i><span class="fw-bold">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('site.profile.setting', Auth::user()->username) }}">
                                    <i class="fa-solid fa-gear me-3"></i><span>Account Setting</span>
                                </a>
                            </li>
                            <li>
                                <x-site.logout-btn />
                            </li>
                        </ul>
                    </div>
                </div>
                <a
                    class="profile-responsive"
                    style="cursor: pointer;"
                    @click="openFloatProfile = !openFloatProfile" 
                    @keydown.escape="openFloatProfile = false"    
                >
                    <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
                </a>
            </li>
        </ul>
    </div>
</div>