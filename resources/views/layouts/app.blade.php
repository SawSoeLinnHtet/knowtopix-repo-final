<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Knowtopix</title>
    <link rel="stylesheet" href="{{ asset('auth/main.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/site/bootstrap/bootstrap.min.css') }}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/all.min.css') }}">
</head>
<body>
    <div class="verification-main-wrap">
        @yield('content')
    </div>

    <!-- bootstrap -->
    <script src="{{ asset('plugins/site/bootstrap/bootstrap.min.js') }}"></script>
    {{-- fontawesome --}}
    <script src="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
</body>
</html>