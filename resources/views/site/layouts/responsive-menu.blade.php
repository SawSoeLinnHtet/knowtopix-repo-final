<div class="col-12 col-lg-0 col-xl-0 d-block d-lg-none d-xl-none">
    <div class="responsive-menu-bar">
        <ul>
            <li>
                <a href="{{ route('site.index') }}">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('site.search.index') }}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-flag"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('site.friend.index') }}">
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
                    <div class="profile-float-detail">
                        <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                        <h5 class="profile-name">
                            Saw Soe Linn Htet
                        </h5>
                        <span class="username">
                            @hazelism
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
                                <a href="#">
                                    <i class="fa-solid fa-user me-3"></i><span class="fw-bold">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-bookmark me-3"></i><span>Upgrade</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-gear me-3"></i><span>Account Setting</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-right-from-bracket me-3"></i><span>Logout</span>
                                </a>
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
                    <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                </a>
            </li>
        </ul>
    </div>
</div>