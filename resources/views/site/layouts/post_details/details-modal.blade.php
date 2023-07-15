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
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-square-check text-danger"></i><span class="fw-bold">Follow</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="img-holder">
                {{ $post->content_area }}
                
                <a href="#" @click="openPostDetailsModal = !openPostDetailsModal">
                    <img src="{{ asset('images/'.$post->thumbnail) }}" alt="" class="mt-3">
                </a>
            </div>
            <div class="card-body-option">
                <div class="like-wrap me-3">
                    <a class="me-2 button like-btn text-danger" href="#" {{ $post->is_liked ? 'text-danger' : 'text-white' }}>
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
        <div class="comment-card-wrap">
            @include('site.layouts.post_details.comment-card')
        </div>
    </div>
    <div class="details-card-footer">
        <div class="create-comment-wrap">
            <div class="img-holder">
                <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
            </div>
            <div class="textarea-container">
                <textarea id="" rows="1" placeholder="Add Comment..." name="comment" class="comment-box"></textarea>
                <a class="comment-submit button" href="#">
                    <i class="fa-solid fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </div>
</div>