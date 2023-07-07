@foreach ($posts as $key => $post)
    <div class="public-post-card">
        <div class="card-header">
            <div class="card-info">
                <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                <div>
                    <a href="#">
                        <h4>{{ $post->User->name }}</h4>
                    </a>
                    <div class="post-created">{{ $post->created_at->diffForHumans() }}</div>
                </div>
            </div>
            <div class="card-option" x-data="{ openOption: false }">
                <button 
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
                <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                <x-site.post.comment-create :id="$post->id"></x-site.post.comment-create>
            </div>
        </div>
    </div>
@endforeach