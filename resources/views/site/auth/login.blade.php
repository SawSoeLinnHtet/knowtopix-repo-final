@extends('site.auth.layouts.app')

@section('content')

@include('site.auth.layouts.page_info')

<form action="{{ route('site.login.auth') }}" method="POST" autocomplete="off">
    @csrf
    <div class="input-wrap">
        <input type="email" placeholder="Enter Your Email" name="email">
    </div>
    <div class="input-wrap">
        <input type="password" placeholder="Enter Your Password" name="password">
    </div>
    <div class="input-wrap submit-btn-wrap">
        <button class="submit-btn" type="submit">
            Sign In
        </button>
    </div>
</form>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\LoginRequest') !!}
@endpush

<div class="form-option">
    <p>No account?</p> <a href="{{ route('site.register.index') }}">Sign Up</a>
</div>

@endsection