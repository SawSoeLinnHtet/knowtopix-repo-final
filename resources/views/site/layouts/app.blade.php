<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/site/bootstrap/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/all.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/css/regular.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('plugins/site/swiper/swiper-bundle.min.css') }}"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('plugins/site/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/site/owl-carousel/owl.theme.default.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/test.css') }}">
    @stack('heading')
</head>
<body 
    id="app" 
    x-data="{ 
        openPostDetailsModal : false, 
        openEditModalBox : false, 
        openDeleteModal : false, 
        openCommentDeleteModal : false,
        openCategoryFloat: false,
        postId : '',
        commentId: ''
    }" 
    x-init="$watch('openEditModalBox', toggleOverflow)"
>
    
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
                <x-site.post.post-edit-modal/>
                <x-site.post.post-delete-modal/>
                @include('site.layouts.comment.comment-delete-modal')
                @include('site.layouts.post-details-modal')
            </main>
        </div>
    </div>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('plugins/site/bootstrap/bootstrap.min.js') }}"></script>
    <!-- fontawesome -->
    <script src="{{  asset('plugins/site/fontawesome/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
    <!-- swiper -->
    <script src="{{ asset('plugins/site/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Alpinejs -->
    <script defer src="{{ asset('plugins/site/alpinejs/cdn.min.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@imacrayon/alpine-ajax@0.2.1/dist/cdn.min.js"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('plugins/site/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- laravel validation -->
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('site/js/main.js') }}"></script>
    @stack('script')
</body>
</html>