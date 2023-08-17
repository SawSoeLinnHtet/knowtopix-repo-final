@extends('site.layouts.app')

@section('content')
<div class="container-fluid px-0 px-lg-2 px-xl-2 py-3">
    <div class="row px-0">
        @include('site.layouts.page_info')
        <div class="col-12 col-lg-12 col-xl-10 offset-0 offset-xl-1">
            <div class="profile-header w-100">
                <div class="d-flex gap-3 justify-content-between">
                    <div class="img-holder">
                        <div class="inner-border">
                            <img src="{{ $user->acsr_check_profile }}" alt="">
                        </div>
                    </div>
                    <div class="popularity-inner-img d-flex align-items-center justify-content-around gap-3 d-md-none d-lg-none d-xl-none">
                        <div class="d-flex flex-column align-items-center">
                            <span class="text-light">
                                Posts
                            </span>
                            <span class="text-white fw-bold fs-5">
                               {{ $posts->count()}}
                            </span>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="text-light">
                                Friends
                            </span>
                            <span class="text-white fw-bold fs-5">
                                {{ $user->acsr_friend_count }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="header-info d-flex flex-row flex-md-column flex-lg-column flex-xl-column pt-3">
                    <div class="d-flex flex-column">
                        <h4 class="name">{{ $user->name }}</h4>
                        <span class="username">@ {{ $user->username }}</span>
                    </div>
                    <div class="profile-option d-flex align-items-center justify-content-between">
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
                                    Friends
                                </span>
                                <span class="text-white fw-bold fs-5">
                                    {{ $user->acsr_friend_count }}
                                </span>
                            </div>
                        </div>
                        <div class="options" x-data="{ openProfileOptions : false }">
                            <a href="{{ route('site.profile.setting', $user->username) }}" class="edit-btn text-decoration-none">
                                Edit profile
                            </a>
                            <button class="options-dropdown" @click="openProfileOptions = !openProfileOptions">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <div 
                                class="options-dropdown-wrap" 
                                x-cloak x-show="openProfileOptions" 
                                @click.away="openProfileOptions = false"
                                x-transition:enter.duration.500ms
                                x-transition:leave.duration.400ms
                            >
                                <ul>
                                    <li>
                                        <a href="{{ route('site.blog.request') }}">
                                            <i class="fa-solid fa-square-plus me-3"></i>Create Blog
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
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-10 offset-0 offset-xl-1">
            <div class="profile-setting-edit-wrap mt-2 py-2 py-lg-4 py-xl-4 px-2 px-lg-4 px-xl-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link tab-change-btn active" id="nav-posts-tab" data-bs-toggle="tab" data-bs-target="#nav-posts" type="button" role="tab" aria-controls="nav-posts" aria-selected="true">Posts</button>
                        <button class="nav-link tab-change-btn" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-images" aria-selected="false">Photos</button>
                        <button class="nav-link tab-change-btn" id="nav-myblogs-tab" data-bs-toggle="tab" data-bs-target="#nav-myblogs" type="button" role="tab" aria-controls="nav-myblogs" aria-selected="false">My Blogs</button>
                        <button class="nav-link tab-change-btn" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="false">About</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="public-posts-wrap">
                                    @if($posts->count() !== 0)
                                        <div class="public-posts-wrap">
                                            @include('site.layouts.public-post-card', $posts)
                                        </div>
                                    @else
                                        <div class="text-center py-3">
                                            <p class="text-danger fw-bold d-flex align-items-center justify-content-center"><i class="fa-solid fa-database me-3 fs-4"></i>This user has no post!</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                        <div class="row profile-photos px-2">
                            @if($posts->count() !== 0)
                                @foreach ($posts as $key => $post)
                                    @if(isset($post->thumbnail))
                                        <div class="col-4 col-md-3 col-lg-4 col-xl-3 p-1 profile-photos-wrap">
                                            <a href="{{ route('site.profile.index', $post->id) }}">
                                                <img src="{{ asset('images/'.$post->thumbnail) }}" alt="">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="text-center py-3">
                                    <p class="text-danger fw-bold d-flex align-items-center justify-content-center"><i class="fa-solid fa-database me-3 fs-4"></i>This user has no photo!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-myblogs" role="tabpanel" aria-labelledby="nav-myblogs-tab">
                        <div class="row p-3 mt-3">
                            <div class="col-12">
                                @if(count($blogs) !== 0)
                                    @foreach ($blogs as $key => $blog)
                                        <section class="d-flex flex-column position-relative flex-lg-row flex-xl-row" x-data="{ openBlogOptions: false }" style="background-color: #0F172A; border-radius: 10px">
                                            @if(auth()->user()->id == $blog->user_id)
                                                <button class="blogs-options-dropdown" @click="openBlogOptions = !openBlogOptions">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <div 
                                                    class="blogs-options-dropdown-wrap" 
                                                    x-cloak x-show="openBlogOptions"
                                                    @click.away="openBlogOptions = false"
                                                    x-transition:enter.duration.500ms
                                                    x-transition:leave.duration.400ms
                                                >
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('site.blog.edit', $blog->slug) }}">
                                                                <i class="fa-solid fa-pen-to-square me-3"></i>Edit Blog
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <x-site.logout-btn />
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="p-2 col-12 col-lg-4 col-xl-4" >
                                                <img src="{{ asset('images/blogs/logo/'.$blog->logo) }}" alt="" width="100%" height="100%" style="object-fit: cover; border-radius: 10px">
                                            </div>
                                            <div class="ps-5 ps-sm-3 col-12 col-lg-8 col-xl-8 py-3 pe-4 position-relative">
                                                <div class="badge pb-2 mb-2" style="background-color: #DB2777">
                                                    {{ $blog->Category->name }}
                                                </div>
                                                <h3 class="text-white">
                                                    <a href="{{ route('site.blog.details', $blog->slug) }}" class="text-decoration-none text-white">{{ $blog->title }}</a>
                                                </h3>
                                                <div class="blog-details d-flex gap-3 align-items-center">
                                                    <p class="text-white">
                                                        <i class="fa-solid fa-calendar-days me-2 text-info"></i><span style="font-size: 12px">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}</span>
                                                    </p>
                                                    <p class="text-secondary">|</p>
                                                    <p class="text-white">
                                                        <i class="fa-solid fa-user-graduate me-2 text-info"></i><span style="font-size: 12px">{{ $blog->author_name }}</span>
                                                    </p>
                                                </div>
                                                <span class="text-secondary">
                                                    {{ $blog->description }}
                                                </span>
                                                <div class="w-100 d-flex justify-content-end">
                                                    <a href="{{ route('site.blog.details', $blog->slug) }}" target="_blank" class="text-decoration-none text-white mb-3 me-3 go-to-blog-btn d-flex align-items-center gap-2 mt-5">
                                                        Go To Blog <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                    @endforeach
                                @else
                                    <div class="text-center py-3">
                                        <p class="text-danger fw-bold d-flex align-items-center justify-content-center"><i class="fa-solid fa-database me-3 fs-4"></i>This user has no post!</p>
                                    </div>
                                @endif
                            </div>
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
                                    Personal Info
                                </span>
                                <span class="mt-2 text-info">
                                    <i class="fa-solid fa-circle-info text-white me-3"></i> {{ $user->personal_info }}
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