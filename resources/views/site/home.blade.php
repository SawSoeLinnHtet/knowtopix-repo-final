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
                    <div class="lds-roller auto-load">
                        <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
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
            // like function 
            $(document).on('click', '.like-btn', function (e) {
                e.preventDefault();

                if($(this).hasClass('text-danger')){
                    $(this).removeClass('text-danger')
                    $(this).addClass('text-white')
                    var x = $(this).next('.like-count').attr('value')
                    $(this).next('.like-count').text(Number(x) - 1).attr('value', Number(x) - 1)
                }else{
                    $(this).addClass('text-danger')
                    $(this).removeClass('text-white')
                    var x = $(this).next('.like-count').attr('value')
                    $(this).next('.like-count').text(Number(x) + 1).attr('value', Number(x) + 1)
                    $(this).next('.like-count')
                }

                let like_url = $(this).data('url')

                $.ajax({
                    url: like_url,
                    data: {
                        '_token': "{{ csrf_token() }}"
                    },
                    type: 'POST',
                    success: function(res){
                        return
                    }
                })
            })
            // comment function
            $(document).on('click', '.comment-submit', function (e) {
                e.preventDefault()
                
                var x = $(this).parent('').parent().prev('.card-body').children('.card-body-option').children('.comment-wrap').children('.comment-count')
                var x_val = x.attr('value')
                x.attr('value', Number(x_val) + 1).text(Number(x_val) + 1)

                var current = $(this)
                var comment = $(this).prev('.comment-box')
                create_url = $(this).data('url')

                $.ajax({
                    url: create_url,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'comment': comment.val()
                    },
                    type: "POST",
                    success: function(res){
                        var comment_wrap = current.parent().prev()

                        let template = `
                        <div class="comment-card">
                                <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                                <div class="text-wrap">
                                    <h6>
                                        {{ Auth::guard('user_auth')->User()->name }}
                                    </h6>
                                    <span>
                                        ${ comment.val() }
                                    </span>
                                </div>
                            </div> 
                        `

                        comment_wrap.append(template);
                        comment.val('')
                    }
                })
            });
        })
    </script>
@endpush