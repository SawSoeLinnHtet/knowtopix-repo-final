@extends('site.auth.layouts.app')
@php
    $title = "Login"    
@endphp

@section('content')

<section class="signup">
    <div class="container">
        <div class="signup-content">
            <form method="POST" action="{{ route('site.login.auth') }}" id="signup-form" class="signup-form">
                @csrf
                <h2 class="form-title">Create Your Account</h2>
                @include('site.auth.layouts.page_info')
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term">Remember me</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-submit">
                        Sign In
                    </button>
                </div>
            </form>
            <p class="loginhere">
                New User?<a href="{{ route('site.register.index') }}" class="loginhere-link" style="margin-left: 10px">Register Here</a>
            </p>
        </div>
    </div>
</section>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\LoginRequest') !!}
@endpush

@endsection