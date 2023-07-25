<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>KnowTopix Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('plugins/backend/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/backend/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('plugins/backend/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/backend/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/backend/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/backend/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">
    {{-- Custom Css --}}
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        
            @include('backend.layouts.topbar')
            @include('backend.layouts.sidebar')

            <!-- Main Content -->
            @yield('content')

            @include('backend.layouts.footer')
        </div>
    </div>

    {{-- alpinejs --}}
    <script src="{{ asset('plugins/backend/alpinejs/cdn.min.js') }}"></script>
    <!-- General JS Scripts -->
    <script src="{{ asset('plugins/backend/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/backend/popper.js') }}"></script>
    <script src="{{ asset('plugins/backend/tooltip.js') }}"></script>
    <script src="{{ asset('plugins/backend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/backend/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('plugins/backend/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/stisla.js') }}"></script>
    
    <!-- JS Libraies -->
    <script src="{{ asset('plugins/backend/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('plugins/backend/chart.min.js') }}"></script>
    <script src="{{ asset('plugins/backend/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/backend/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('plugins/backend/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
    {{-- Laravel Validation --}}
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    {{-- Pages script --}}
    <script>
        $('.go_back').on('click', function() {
            window.history.go(-1);
            return false;
        });
    </script>
    @stack('script')

</body>
</html>