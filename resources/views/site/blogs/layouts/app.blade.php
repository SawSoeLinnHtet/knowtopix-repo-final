<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Mediumish - A Medium style template by WowThemes.net</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('blogs/assets/css/mediumish.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('blogs/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/all.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/regular.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('blogs/assets/css/test.css') }}">
</head>

<body>
    @include('site.blogs.layouts.navbar')
    <div class="container">
        @yield('content')
        @include('site.blogs.layouts.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('blogs/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('blogs/assets/js/tether.min.js') }}"></script>
    <script src="{{  asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
    <script src="{{ asset('blogs/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('blogs/assets/js/mediumish.js') }}"></script>
    <script src="{{ asset('blogs/assets/js/ie10-viewport-bug-workaround.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @stack('script')
</body>
</html>
