<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/test.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/site/bootstrap/bootstrap.min.css') }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/all.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/regular.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('plugins/site/swiper/swiper-bundle.min.css') }}"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('plugins/site/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/site/owl-carousel/owl.theme.default.min.css') }}">
    
</head>
<body>
    
    <div class="main-content">
        <div class="container-fluid main-content-wrapper p-0">
            @include('site.layouts.sidebar')
            <main>
                <div class="content-wrap">
                    <div class="main-wrap p-5 px-3">
                        @yield('content')
                    </div>
                    <div class="scroll-to-top scrollTop">
                        <i class="fa-solid fa-arrow-up"></i>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset('plugins/site/bootstrap/bootstrap.min.js') }}"></script>
    <!-- fontawesome -->
    <script src="{{  asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
    <!-- swiper -->
    <script src="{{ asset('plugins/site/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Alpinejs -->
    <script defer src="{{ asset('plugins/site/alpinejs/cdn.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('plugins/site/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- laravel validation -->
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('site/js/main.js') }}"></script>
    
    @stack('script')
</body>
</html>