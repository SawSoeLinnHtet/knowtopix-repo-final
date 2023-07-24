@extends('site.layouts.app')

@section('content')

<div class="container-fluid py-0">
    <div class="row p-0">
        <div class="col-0 d-none d-xl-block col-lg-7 col-xl-8 p-0 rounded-none">
            <div class="w-100 h-100 position-relative" style="background-color: #1F2B3F">
                <button id="site-back-btn" class="site-back-btn position-absolute top-0 left-0">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <img src="{{ asset('images/'.$post->thumbnail) }}" width="100%" height="800px" style="object-fit: contain" alt="">
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-4 public-posts-wrap p-0">
            <div class="public-post-card rounded-0 pt-3" style="height: max-content; min-height: 800px">
                <div class="card-heading">
                    <div class="card-info">
                        <img src="{{ $post->User->acsr_check_profile }}" alt="">
                        <div>
                            <a href="#">
                                <h4>{{ $post->User->name }}</h4>
                            </a>
                            <div class="post-created"><i class="fa-solid fa-earth-americas text-info me-2"></i>{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <div class="card-option" x-data="{ openOption: false }">
                        <button 
                            class="option-menu-btn"
                            @click="openOption= !openOption"
                            @keydown.escape="openOption= false"
                        >
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <div 
                            class="option-float-wrap" 
                            x-cloak x-show="openOption"
                            @click.away="openOption= false"
                            x-transition:enter.duration.500ms
                            x-transition:leave.duration.400ms
                        >
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-regular fa-bookmark text-primary"></i><span class="fw-bold">Add To Favorites</span>
                                    </a>
                                </li>
                                @if ($post->user_id !== auth()->user()->id)
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-square-check text-danger"></i><span class="fw-bold">Follow</span>
                                        </a>
                                    </li>
                                @endif
                                @if ($post->user_id == auth()->user()->id)
                                    <x-site.post.post-edit-btn :post-id="$post->id"></x-site.post.post-edit-btn>
                                    <x-site.post.post-delete-btn :post-id="$post->id"></x-site.post.post-delete-btn>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-holder">
                        @if(isset($post->content_area))
                            {{ $post->content_area }}
                        @endif
                    </div>
                    <div class="img-holder d-block d-xl-none">        
                        @if(isset($post->thumbnail))
                            <a>
                                <img src="{{ asset('images/'.$post->thumbnail) }}" alt="" class="mt-3">
                            </a>
                        @endif
                    </div>
                    <div class="card-body-option">
                        <div class="like-wrap me-3">
                            <x-site.post.post-like-btn :post-id="$post->id" :like-user-id="$post->is_liked"></x-site.post.post-like-btn>
                            <span class="like-count" value="{{ $post->PostLike->count() }}">
                                {{ $post->PostLike->count() }}
                            </span>
                        </div>
                        <div class="comment-wrap">
                            <button class="me-2">
                                <i class="fa-solid fa-comment-dots"></i>
                            </button>
                            <span class="comment-count" value="{{ $post->PostComment->count() }}">
                                {{ $post->PostComment->count() }}
                            </span>
                        </div>
                        <button class="normal-btn ms-auto">
                            <i class="fa-regular fa-share-from-square"></i>
                        </button>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="comments-wrap">
                        @if($post->PostComment->count() !== 0)
                             @foreach ($post->PostComment as $key => $comment)
                                <div class="comment-card">
                                    <img src="{{ $comment->User->acsr_check_profile }}" alt="">
                                    <div class="comment-text-wrapper d-flex flex-column" x-data="{openCommentBox: false, comment: '{{ $comment->comment }}'}">
                                        <div class="text-wrap">
                                            <a href="{{ route('site.friend.details', $comment->user_id) }}" class="text-decoration-none text-white">
                                                <h6>
                                                    {{ $comment->User->name }}
                                                </h6>
                                            </a>
                                            <span 
                                                id="contact_1" 
                                                x-show="!openCommentBox"
                                                x-transition:enter.duration.500ms
                                                x-html="comment"
                                                @keyup.escape.window="openCommentBox = false"
                                            >
                                            </span>
                                            <div 
                                                x-cloak x-show="openCommentBox" 
                                                x-transition:enter.duration.500ms
                                                class="py-2 editCommentBox"
                                            >
                                                <div class="textarea-container">
                                                    <textarea id="" rows="1" placeholder="Add Comment..."  name="comment" class="comment-box" x-model="comment" required></textarea>
                                                    <a id="edit-comment-click" class="edit-comment-submit button" href="#" @click="openCommentBox=false,comment=comment" data-url="{{ route('site.post.comment.update', [$comment->post_id, $comment->id]) }}">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                    </a>
                                                </div>
                                                <a class="edit-modal-cancel-btn" style="cursor: pointer" @click="openCommentBox = false">Esc to Cancel</a>
                                            </div>
                                        </div>
                                        <div class="comment-time d-flex gap-3 align-items-center">
                                            <p>{{ $comment->acsr_created_at }}</p>
                                            @if ($comment->User->id == auth()->user()->id)
                                                <a class="text-decoration-none text-info" style="cursor: pointer" @click="openCommentBox = true">Edit</a>
                                                <a class="text-decoration-none text-warning" style="cursor: pointer">Delete</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="create-comment-wrap">
                        <div class="img-holder">
                            <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
                        </div>
                        <x-site.post.comment-create :id="$post->id"></x-site.post.comment-create>
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
    $(document).ready(function() {
        // like function 
        $(document).on('click', '.like-btn', function(e) {
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
        });
        // comment function
        $(document).on('click', '.comment-submit', function(e){
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
                    var comment_wrap = current.parent().parent().prev()

                    let template = `
                        <div class="comment-card">
                            <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
                            <div class="d-flex flex-column">
                                <div class="text-wrap">
                                    <a href="{{ auth()->user()->acsr_check_user_link }}" class="text-decoration-none text-white">
                                        <h6>
                                            {{ auth()->user()->name }}
                                        </h6>
                                    </a>
                                    <span>
                                        ${ comment.val() }
                                    </span>
                                </div>
                                <p class="comment-time">
                                    Now
                                </p>
                            </div>
                        </div>
                    `;
                    comment_wrap.prepend(template);
                    comment.val('')
                }
            })
        });
        // edit function
        $(document).on('click', '.post-edit-modal-btn', function(e) {
            e.preventDefault();

            edit_url = $(this).data('url')

            $.ajax({
                url: edit_url,
                type: 'GET',
                success: function (res) {
                    $('#edit-modal-box-wrap').html(res.html)
                } 
            })
        }); 
        // modal function
        $(document).on('click', '#edit-comment-click', function() {
            var edit_url =  $(this).data('url')
            var edit_comment = $(this).prev('.comment-box')

            console.log(edit_comment.val())
            $.ajax({
                type: 'PATCH',
                url: edit_url,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'comment': edit_comment.val()
                },
                succes: function (res) {
                    console.log(res)
                }
            })
        })
    })
</script>

@endpush