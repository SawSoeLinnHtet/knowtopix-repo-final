@extends('site.layouts.app')

@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-12 border-white">
                <div class="d-flex align-content-center justify-content-between">
                    <h3 class="text-white">
                        Friend Requests
                    </h3>
                    <span class="h5 text-danger">
                        <i class="fa-solid fa-rotate-right"></i>
                    </span>
                </div>
                <div class="friend_requests_wrap">
                    <div class="row">
                        @if($request_users->count() != 0)
                            @include('site.layouts.request-friend-card', $request_users)
                        @else
                            <div class="text-danger h5">
                                There is no requests.
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="bg-white mt-4">
            </div>
            <div class="col-12 mt-3" style="min-height: 750px">
                <div class="d-flex align-content-center justify-content-between px-2">
                    <h3 class="text-white">
                        Suggested For You
                    </h3>
                    <span class="h5 text-danger">
                        <i class="fa-solid fa-rotate-right"></i>
                    </span>
                </div>
                <div class="friend_requests_wrap">
                    <div class="row mb-5" id="suggest-post">
                        @include('site.layouts.suggest-friend-card', $users)
                    </div>
                    <div class="lds-roller auto-load text-warning text-center">
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
                </div>
            </div>
            @include('site.layouts.responsive-menu')
        </div>
    </div>
@endsection

@push('script')

<script>
    $(document).ready(function () { 
        // infinite scroll
        var ENDPOINT = "{{ route('site.friend.index') }}";
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
                    $(response.html).appendTo('#suggest-post');
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
        }
    })
</script>

@endpush