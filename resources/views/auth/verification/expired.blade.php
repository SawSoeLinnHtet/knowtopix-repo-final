@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="card px-3 py-3">
            <div class="card-body">
                <h3 class="card-title text-dark mb-4 fw-bolder">Email Verificatin Link Expired</h3>
                <img src="{{ asset('site/img/expired.png') }}" class="verify-img" alt="">
                <p class="card-text verify-alert mb-4">
                    Looks like the verification link has expired. <br/>
                    Not to worry, we can send the link again.
                </p>
                <a href="{{ route('verification.resend') }}" class="btn text-white fw-bolder px-3 py-2 resend-btn">Resend Verification Link</a>
            </div>
        </div>
    </div>

@endsection