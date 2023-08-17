<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnowTopix | {{ $title }}</title>
    <link rel="icon" href="{{ asset('site/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('site/auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/auth/style.css') }}">
</head>
<body style="background-image: url({{ asset('site/auth/images/signup-bg.jpg') }})">

    <div class="main">
        @yield('content')
    </div>

    <!-- JS -->
    <script src="{{ asset('site/auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <script src="{{ asset('site/auth/js/main.js') }}"></script>
    @stack('script')
</body>
</html>