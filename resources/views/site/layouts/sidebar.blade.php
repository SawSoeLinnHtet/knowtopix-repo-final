<aside>
    <div class="sidebar">
        <div class="site-logo-wrap">
            <img src="{{ asset('site/img/logo.png') }}" class="logo-img" alt="">
            {{-- <h3 class="site-logo">
                Knowtopix
            </h3> --}}
            <img src="{{ asset('site/img/long_logo.png') }}" class="site-logo" alt="">
        </div>
        <div class="sidebar-menu">
            @include('site.layouts.nav-menu')
        </div>
        <div class="profile-dropdown" x-data="{ openFloatProfile: false }">
            <div 
                class="wrapper" 
                @click="openFloatProfile = !openFloatProfile" 
                @keydown.escape="openFloatProfile = false"
            >
                <div class="profile-name">
                    <img src="{{ Auth::user()->acsr_check_profile }}" alt="">
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                </div>
                <div class="drop-icon">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
            <div 
                class="profile-float-wrapper" 
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
        </div>
    </div>
</aside>