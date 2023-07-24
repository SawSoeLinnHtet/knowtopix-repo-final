@extends('layouts.app')

@section('content')

    <div class="wrapper expired">
        <div class="card px-3 py-3">
            <div class="card-body">
                <img src="{{ asset('site/img/link-expired.gif') }}" class="verify-img" alt="">
                <h3 class="card-title text-danger mb-4 fw-bolder">Email Verificatin Link Expired</h3>
                <p class="card-text verify-alert mb-4">
                    Looks like the verification link has expired. <br/>
                    Not to worry, we can send the link again.
                </p>
                <a href="{{ route('verification.resend') }}" class="btn text-white fw-bolder px-3 py-2 resend-btn">Resend Verification Link<i class="fa-solid fa-paper-plane ms-2"></i></a>
            </div>
        </div>
    </div>

@endsection