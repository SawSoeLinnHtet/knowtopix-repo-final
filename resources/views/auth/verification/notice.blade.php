@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="card px-3 py-3">
            <div class="card-body">
                <h3 class="card-title text-dark mb-4 fw-bolder">Verify Your Email Address</h3>
                <img src="{{ asset('site/img/open.png') }}" class="verify-img" alt="">
                <p class="card-text verify-alert mb-4">
                    Please check your email and <br/>click on the verification link to verify your email address.
                </p>
                <a href="#" class="btn text-white fw-bolder px-3 py-2 resend-btn">Resend Verification Link</a>
            </div>
        </div>
    </div>

@endsection