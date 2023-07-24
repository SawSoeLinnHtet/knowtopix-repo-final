@extends('layouts.app')

@section('content')

    <div class="wrapper position-relative">
        <div class="card px-3 py-3 pb-5">
            <div class="card-body">
                <img src="{{ asset('site/img/email-sent-animation.gif') }}" class="verify-img" alt="">
                <h3 class="card-title text-success mb-4 fw-bolder">Verification Link Sent Successfully</h3>    
                <p class="card-text verify-alert mb-4">
                    Your verification link is successfully sent. Please check your email and click to verify.
                </p>
            </div>
        </div>
        <div class="alert alert-info position-absolute bottom-0 right-0 p-2 w-100 mb-0"><i class="fa-solid fa-circle-info me-2   "></i> This link will expire in next 5 minutes. Thank You.</div>
    </div>

@endsection