<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('site/auth/main.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/site/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="main-content">
        <div class="wrap">
            <img src="{{ asset('site/img/logo.png') }}" alt="">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('site/auth/main.js') }}"></script>
    <script src="{{ asset('plugins/site/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/js/all.min.js') }}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    @stack('script')
</body>
</html>