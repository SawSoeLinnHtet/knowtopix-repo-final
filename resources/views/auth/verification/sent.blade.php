@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="card px-3 py-3">
            <div class="card-body">
                <h3 class="card-title text-dark mb-4 fw-bolder">Verification Link Sent Successfully</h3>
                <img src="{{ asset('site/img/sent.png') }}" class="verify-img" alt="">
                <p class="card-text verify-alert mb-4">
                    Your verification link is successfully sent. Please check your email and click to verify.
                </p>
                <small class="text-danger">Notice! This link will expire in next 5 minutes. Thank You.</small>
            </div>
        </div>
    </div>

@endsection