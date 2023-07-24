<div class="details-wrap">
    <div class="details-header">
        <h4 class="mt-2">
            {{ $post->User->name }} 's Post
        </h4>
        <button class="close-btn" @click="openPostDetailsModal = !openPostDetailsModal">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="details-body">
        <div class="details-body-header">
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
                {{ $post->content_area }}
            </div>
            @if(isset($post->thumbnail))
                <div class="img-holder">
                    <a href="#" @click="openPostDetailsModal = !openPostDetailsModal">
                        <img src="{{ asset('images/'.$post->thumbnail) }}" alt="" class="mt-1">
                    </a>
                </div>
            @endif
            <div class="card-body-option">
                <div class="like-wrap me-3">
                    <a class="me-2 button details-like-btn {{ $post->is_liked ? 'text-danger' : 'text-white' }}" href="#" data-url="{{ route('site.post.like', $post->id) }}">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                    <span class="like-count" value="{{ $post->PostLike->count() }}">
                        {{ $post->PostLike->count() }}
                    </span>
                </div>
                <div class="comment-wrap">
                    <button class="me-2">
                        <i class="fa-solid fa-comment-dots"></i>
                    </button>
                    <span class="comment-count modal-comment-count" value="{{ $post->PostComment->count() }}">
                        {{ $post->PostComment->count() }}
                    </span>
                </div>
                <button class="normal-btn ms-auto">
                    <i class="fa-regular fa-share-from-square"></i>
                </button>
            </div>
        </div>
        <div class="comment-card-wrap" id="details-comment-card-wrap">
            @include('site.layouts.post_details.comment-card', ['comments' => $post->PostComment])
            <div class="spinner-border text-info" id="loading-spinner" role="status" style="display: none; margin-left: 100px">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="details-card-footer">
        <div class="create-comment-wrap">
            <div class="img-holder">
                <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
            </div>
            <div class="textarea-container">
                <textarea id="" rows="1" placeholder="Add Comment..." name="comment" class="comment-box"></textarea>
                <a class="details-comment-submit button" href="#" data-url="{{ route('site.post.comment', $post->id) }}">
                    <i class="fa-solid fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </div>
</div>