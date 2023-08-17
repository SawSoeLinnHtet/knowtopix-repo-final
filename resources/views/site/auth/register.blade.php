@extends('site.auth.layouts.app')
@php
    $title = "Register"
@endphp
@section('content')

<section class="signup">
    <div class="container">
        <div class="signup-content">
            <form method="POST" action="{{ route('site.register.store') }}" id="signup-form" class="signup-form">
                @csrf
                <h2 class="form-title">Create your account</h2>
                @include('site.auth.layouts.page_info')
                <div class="form-group">
                    <input type="text" class="form-input" name="name" id="email" placeholder="Your Name"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="username" id="username" placeholder="Your Username"/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" name="password_confirmation" id="password" placeholder="Repeat Your Password"/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-submit">
                        Sign In
                    </button>
                </div>
            </form>
            <p class="loginhere">
                Already have account?<a href="{{ route('site.login.index') }}" class="loginhere-link" style="margin-left: 10px">Login Here</a>
            </p>
        </div>
    </div>
</section>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\RegisterRequest') !!}
@endpush

@endsection

