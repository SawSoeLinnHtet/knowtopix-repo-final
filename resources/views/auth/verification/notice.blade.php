@extends('layouts.app')

@section('content')

    <div class="wrapper warning">
        <div class="card px-3 py-3">
            <div class="card-body">
                <img src="{{ asset('site/img/warning-message.gif') }}" class="verify-img" alt="">
                <h3 class="card-title notice-title mb-4 fw-bolder">Verify Your Email Address</h3>  
                <p class="card-text verify-alert mb-4">
                    Please check your email and <br/>click on the verification link to verify your email address.
                </p>
                <a href="{{ route('verification.resend') }}" class="btn text-white fw-bolder px-3 py-2 resend-btn">Resend Verification Link<i class="fa-solid fa-paper-plane ms-2"></i></a>
            </div>
        </div>
    </div>

@endsection