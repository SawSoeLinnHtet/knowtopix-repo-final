@extends('site.auth.layouts.app')

@section('content')

<form action="{{ route('site.register.store') }}" method="POST" autocomplete="off">
    @csrf
    <div class="input-wrap">
        <input type="text" name="name" placeholder="Enter Your Name">
    </div>
    <div class="input-wrap">
        <input type="text" name="username" placeholder="Enter Your Username">
    </div>
    <div class="input-wrap">
        <input type="email" name="email" placeholder="Enter Your Email">
    </div>
    <div class="input-wrap">
        <input type="password" name="password" placeholder="Enter Your Password">
    </div>
    <div class="input-wrap">
        <input type="password" name="password_confirmation" placeholder="Repeat Your Password">
    </div>
    <div class="input-wrap submit-btn-wrap">
        <button class="submit-btn" type="submit">
            Sign Up
        </button>
    </div>
</form>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\RegisterRequest') !!}
@endpush

<div class="form-option">
    <p>Already login?</p> <a href="{{ route('site.login.index') }}">Sign In</a>
</div>

@endsection

