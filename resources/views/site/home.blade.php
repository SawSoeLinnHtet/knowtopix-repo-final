@extends('site.layouts.app')

@section('content')
    <div class="posts-wrap">
        <div class="container-fluid p-0 py-2">
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    @include('site.layouts.create-post-modal')
                    <div class="public-posts-wrap" id="public-posts-wrap">
                        @include('site.layouts.public-post-card', $posts)
                    </div>
                    <div class="auto-load loader">
                        <div class="square" id="sq1"></div>
                        <div class="square" id="sq2"></div>
                        <div class="square" id="sq3"></div>
                        <div class="square" id="sq4"></div>
                        <div class="square" id="sq5"></div>
                        <div class="square" id="sq6"></div>
                        <div class="square" id="sq7"></div>
                        <div class="square" id="sq8"></div>
                        <div class="square" id="sq9"></div>
                    </div>
                </div>
                @include('site.layouts.right-sidebar', ['users' => $users])
                @include('site.layouts.responsive-menu')
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () { 
            // infinite scroll
            var ENDPOINT = "{{ route('site.index') }}";
            var page = 1;
            var has_response = true;

            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 20)) {
                    page++;
                    if(has_response) {
                        infinteLoadMore(page);
                    }
                }
            });
            function infinteLoadMore(page) {
                $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response) {
                    if (response.html == '') {
                        $('.auto-load').html("We don't have more data to display");
                        has_response = false
                        return;
                    }else{
                        has_response = true

                        $(response.html).appendTo('#public-posts-wrap');
                    }

                    $('.auto-load').hide();
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
            }
        })
    </script>
@endpush