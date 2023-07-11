@foreach ($posts as $key => $post)
    <div class="public-post-card">
        <div class="card-header">
            <div class="card-info">
                <img src="{{ asset('site/img/user.jpeg')}}" alt="">
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
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-square-check text-danger"></i><span class="fw-bold">Follow</span>
                            </a>
                        </li>
                        @if ($post->user_id == auth()->guard('user_auth')->user()->id)
                            @include('site.layouts.post-edit-btn', ['post_id' => $post->id])
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="img-holder">
                @if(isset($post->content_area))
                    {{ $post->content_area }}
                @endif
                
                @if(isset($post->thumbnail))
                    <img src="{{ asset('images/'.$post->thumbnail) }}" alt="" class="mt-3">
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
                    <x-site.comment-card :comments="$post->PostComment"/>
                @endif
            </div>
            <div class="create-comment-wrap">
                <img src="{{ $post->User->profile ? asset('images/profile/'.$post->User->profile) : asset('site/img/user.jpeg') }}" alt="">
                <x-site.post.comment-create :id="$post->id"></x-site.post.comment-create>
            </div>
        </div>
    </div>
@endforeach

@push('script')

<script>
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
    // edit function
    $(document).on('click', '.post-edit-btn', function() {
        
        edit_url = $(this).data('url')
        current_item = $(this);

        $.ajax({
            url: edit_url,
            type: 'GET',
            success: function (res) {
                $('.edit-modal-form-wrap').html(res.html)
            } 
        })
    })
    </script>

@endpush