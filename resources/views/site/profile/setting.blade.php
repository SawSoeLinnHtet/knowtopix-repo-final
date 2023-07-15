@extends('site.layouts.app')

@section('content')

<div class="container px-0 px-lg-5 px-xl-5 py-3">
    <div class="row">
        <div class="col-12 col-lg-8 col-xl-8 offset-0 offset-md-0 offset-lg-1 offset-xl-2" x-data="{ openProfileUpload : false }" x-init="$watch('openProfileUpload', toggleOverflow)">
            <div class="setting-title">
                <a href="{{ route('site.profile.index' , $user->username) }}" class="btn shadow-none text-primary ps-0 mb-3 text-decoration-none"><i class="fa-solid fa-chevron-left me-2"></i> Back</a>
                <h2 class="text-white mb-4">
                    Settings
                </h2>
            </div>
            @include('site.layouts.page_info')
            <div class="profile-setting-wrap">
                <div class="img-holder">
                    <img src="{{ asset('images/profile/'.$user->profile) }}" alt="">
                    <a
                        href="#"
                        @click="openProfileUpload = !openProfileUpload"
                    >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <div class="name-info">
                    <h4>
                        {{ $user->name }}
                    </h4>
                    <span>
                        @ {{ $user->username }}
                    </span>
                </div>
            </div>
            @include('site.profile.partials.upload_form')
            <div class="profile-setting-edit-wrap mt-2 py-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link tab-change-btn active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-checked="true">General</button>
                        <button class="nav-link tab-change-btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-checked="false">Password</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="form-container py-5">
                            @include('site.profile.partials.general_form')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="form-container py-5">
                            @include('site.profile.partials.password_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection