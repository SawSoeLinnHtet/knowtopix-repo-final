@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="card px-3 py-3">
            <div class="card-body">
                <img src="{{ asset('site/img/verification-success.gif') }}" class="verify-img" alt="">
                <h3 class="card-title text-success mb-4 fw-bolder">Successfully Verified</h3>
                <p class="card-text verify-alert mb-4">
                    You have been verified email successfully. Please sign in to see our contents.
                </p>
                <a href="{{ route('site.login.index') }}" class="btn text-white fw-bolder px-3 py-2 resend-btn">Sign In here</a>
            </div>
        </div>
    </div>

@endsection