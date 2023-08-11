@foreach ($posts as $key => $post)
    <div class="public-post-card">
        <div class="card-heading">
            <div class="card-info">
                <img src="{{ $post->User->acsr_check_profile }}" alt="">
                <div>
                    <a href="{{ $post->User->acsr_check_user_link }}">
                        <h4>{{ $post->User->name }}</h4>
                    </a>
                    <div class="post-created"><i class="fa-solid {{ $post->privacyIcon($post->privacy) }} text-info me-2"></i>{{ $post->acsr_created_at }}</div>
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
            <div class="img-holder">        
                @if(isset($post->thumbnail))
                    <a href="{{ route('site.posts.show', $post->id) }}">
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
                    <span 
                        id="comment-count"
                        class="comment-count click-details-modal"
                        @click="openPostDetailsModal = !openPostDetailsModal"
                        data-url="{{ route('site.posts.show', $post->id) }}" 
                        value="{{ $post->PostComment->count() }}"
                    >
                        <a href="#" class="text-decoration-none text-white">
                            {{ $post->PostComment->count() }}
                        </a>
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
                <div class="img-holder">
                    <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
                </div>
                <x-site.post.comment-create :id="$post->id"></x-site.post.comment-create>
            </div>
        </div>
    </div>
@endforeach

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
            
            var x = $(this).parent().parent().parent().prev('.card-body').children('.card-body-option').children('.comment-wrap').children('.comment-count')
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
                    console.log(res)
                    var comment_wrap = current.parent().parent().prev()
                    var res_comment =  res.data.comment
                    let template = res.data.html;
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
        $(document).on('click', '.click-details-modal', function (e) {
            e.preventDefault();

            show_url = $(this).data('url');

            $.ajax({
                type: 'GET',
                url: show_url,
                success: function (res) {
                    $('#post-details-modal-wrap').html(res.html)
                }
            })
        })
    })
</script>

@endpush