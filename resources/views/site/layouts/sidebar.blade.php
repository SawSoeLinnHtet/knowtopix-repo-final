<aside>
    <div class="sidebar">
        <div class="site-logo-wrap">
            <img src="{{ asset('site/img/logo.png') }}" class="logo-img" alt="">
            <h3 class="site-logo">
                Knowtopix
            </h3>
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
                    <img src="{{ asset('site/img/user.jpeg') }}" alt="">
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
                <div class="profile-float-detail">
                    <img src="{{ Auth::user()->profile ? asset('images/profile/'.Auth::user()->profile) : asset('images/profile/user.jpeg') }}" alt="">
                    <h5 class="profile-name">
                        {{ Auth::user()->name }}
                    </h5>
                    <span class="username">
                        @ {{ Auth::user()->username }}
                    </span>
                    <div class="popular">
                        <p class="following">
                            620K<span class="ms-1">Following</span>
                        </p>
                        <p class="followers">
                            28K<span class="ms-1">Followers</span>
                        </p>
                    </div>
                </div>
                <div class="collection-wrapper">
                    <ul>
                        <li>
                            <a href="{{ route('site.profile.index', Auth::user()->username)}}">
                                <i class="fa-solid fa-user me-3"></i><span class="fw-bold">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-bookmark me-3"></i><span>Upgrade</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.profile.setting', Auth::user()->username) }}">
                                <i class="fa-solid fa-gear me-3"></i><span>Account Setting</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('site.logout') }}" method="POST"> 
                                @csrf
                                <button class="btn btn-link text-decoration-none text-white shadow-none" style="padding-left: 0 !important; outline: none">
                                    <i class="fa-solid fa-right-from-bracket me-3"></i><span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>