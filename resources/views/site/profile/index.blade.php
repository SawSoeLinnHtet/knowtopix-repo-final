@extends('site.layouts.app')

@section('content')
<div class="container-fluid px-0 px-lg-2 px-xl-2 py-3">
    <div class="row px-0">
        <div class="col-12 col-lg-10 col-xl-10 offset-0 offset-lg-1 offset-xl-1">
            <div class="profile-header w-100">
                <div class="d-flex gap-3 justify-content-between">
                    <div class="img-holder">
                        <div class="inner-border">
                            <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="popularity-inner-img d-flex align-items-center justify-content-around gap-3 d-md-none d-lg-none d-xl-none">
                        <div class="d-flex flex-column align-items-center">
                            <span class="text-light">
                                Posts
                            </span>
                            <span class="text-white fw-bold fs-5">
                                13
                            </span>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="text-light">
                                Followers
                            </span>
                            <span class="text-white fw-bold fs-5">
                                159
                            </span>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="text-light">
                                Friends
                            </span>
                            <span class="text-white fw-bold fs-5">
                                123
                            </span>
                        </div>
                    </div>
                </div>
                <div class="header-info">
                    <h4 class="name">{{ $user->name }}</h4>
                    <span class="username">@ {{ $user->username }}</span>
                    <span class="personal-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius ducimus, at incidunt ipsum vitae voluptatem corporis! Error suscipit.</span>
                    <div class="profile-option d-flex align-items-center justify-content-between mt-3">
                        <div class="popularity d-lg-flex d-md-flex d-xl-flex align-items-center justify-content-around gap-3 d-none d-none">
                            <div class="d-flex flex-column align-items-center">
                                <span class="text-light">
                                    Posts
                                </span>
                                <span class="text-white fw-bold fs-5">
                                    {{ $posts->count() }}
                                </span>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <span class="text-light">
                                    Followers
                                </span>
                                <span class="text-white fw-bold fs-5">
                                    159
                                </span>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <span class="text-light">
                                    Friends
                                </span>
                                <span class="text-white fw-bold fs-5">
                                    123
                                </span>
                            </div>
                        </div>
                        <div class="options">
                            <a href="{{ route('site.profile.setting', $user->username) }}" class="edit-btn text-decoration-none">
                                Edit profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-10 col-xl-8 offset-0 offset-lg-1 offset-xl-1">
            <div class="profile-setting-edit-wrap mt-2 py-2 py-lg-4 py-xl-4 px-2 px-lg-4 px-xl-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link tab-change-btn active" id="nav-posts-tab" data-bs-toggle="tab" data-bs-target="#nav-posts" type="button" role="tab" aria-controls="nav-posts" aria-selected="true">Posts</button>
                        <button class="nav-link tab-change-btn" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-images" aria-selected="false">Photos</button>
                        <button class="nav-link tab-change-btn" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="false">About</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                        <div class="row p-0">
                            <div class="col-12">
                                <div class="public-posts-wrap">
                                    @include('site.layouts.public-post-card', $posts)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                        <div class="row py-4 profile-photos px-2">
                            @foreach ($posts as $key => $post)
                                @if(isset($post->thumbnail))
                                    <div class="col-4 col-md-3 col-lg-4 col-xl-3 p-1 profile-photos-wrap">
                                        <a href="">
                                            <img src="{{ asset('images/'.$post->thumbnail) }}" alt="">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="row p-3 mt-3">
                            <div class="d-flex flex-column mb-3">
                                <span class="fw-bold text-light fs-5">
                                    Career & Job
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-briefcase me-3 text-white"></i> Web Developer
                                </span>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <span class="fw-bold text-light fs-5">
                                    Contact Info
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-phone text-white me-3"></i> {{ $user->phone }}
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-envelope me-3 text-white"></i> {{ $user->email }}
                                </span>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <span class="fw-bold text-light fs-5">
                                    Live in
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-location-dot me-3 text-white"></i>{{ $user->address }}
                                </span>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <span class="fw-bold text-light fs-5">
                                    Gender
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-venus-mars me-3 text-white"></i> {{ ucwords($user->gender) }}
                                </span>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <span class="fw-bold text-light fs-5">
                                    Popularity
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-star me-3 text-white"></i> 2.3
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('site.layouts.responsive-menu')
    </div>
</div>

@endsection