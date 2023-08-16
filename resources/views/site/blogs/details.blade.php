@extends('site.blogs.layouts.app')

@section('content')
<div class="w-100 bg-white mb-5 shadow-sm">
    <div class="container">
        @include('site.blogs.layouts.header', ['title' => $blog->title, 'description' => $blog->description, 'category' => $blog->Category->name])
    </div>
</div>
<div class="container">
    <section class="featured-posts mb-3">
        <div class="section-title">
            <h2><span>Featured</span></h2>
        </div>
        @if(count($features) !== 0)
            <div class="row">
                @foreach ($features as $feature)
                    <div class="col-6 px-4">
                        <div class="row shadow-lg p-1 bg-white border border-light" style="border-radius: 5px">
                            <div class="col-5 p-0">
                                <img src="{{ asset('images/blogs/posts/'.$feature->post_thumbnail) }}" alt="" class="" width="100%" height="300px" style="object-fit: cover;border-radius: 5px">
                            </div>
                            <div class="col-7 bg-white pl-4 pt-3 position-relative">
                                <h4 class="text-dark">
                                    <a href="{{ route('site.blog.post.details', [$blog->slug, $feature->slug]) }}" class="text-decoration-none text-dark">
                                        {{ $feature->title }}
                                    </a>
                                </h4>
                                <p class="text-secondary" style="font-size: 14px">
                                    {{ $feature->description }}
                                </p>
                                <div class="mt-3 px-2 py-3 d-flex align-items-center w-100 position-absolute" style="right: 0; bottom: 0">
                                    <span>
                                        <img src="{{ asset('site/img/logo.png') }}" class="img-thumbnail rounded-circle" alt="" style="width: 45px; height: 45px">
                                    </span>
                                    <span class="author-meta ml-2">
                                        <span class="post-name">{{ $blog->author_name }}</span><br/>
                                        <span class="post-date" style="font-size: 12px">
                                            {{ $feature->created_at->diffForHumans() }}
                                        </span>
                                        <span class="dot"></span>
                                        <span class="post-read" style="font-size: 12px">6 min read</span>
                                    </span>
                                    <span>
                                        <a href="{{ route('site.blog.post.details', [$blog->slug, $feature->slug]) }}" style="float: right" class="text-decoration-none text-dark">
                                            <i class="fa-solid fa-book-open h5 mt-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                There is no feature posts right now. Please come back later.
            </div>
        @endif
    </section>

    <section class="recent-posts">
        <div class="section-title">
            <h2><span>All Posts</span></h2>
        </div>
         @if(count($posts) !== 0)
            <div class="card-columns listrecent">
                @foreach ($posts as $post)
                    <div class="card shadow-lg">
                        <a href="{{ route('site.blog.post.details',[$blog->slug, $post->slug]) }}">
                            <img class="img-fluid thumbnail-img" src="{{ asset('images/blogs/posts/'.$post->post_thumbnail) }}" alt="">
                        </a>
                        <div class="card-block px-3 py-3 border-top border-info">
                            <h2 class="card-title"><a href="{{ route('site.blog.post.details',[$blog->slug, $post->slug]) }}">{{ $post->title }}</a></h2>
                            <div style="height: 100px; overflow-y: scroll">
                                <h4 class="card-text">{{ $post->description }}</h4>
                            </div>
                            <div class="metafooter">
                                <div class="wrapfooter">
                                    <span class="meta-footer-thumb">
                                        <a href="{{ route('site.blog.author_details', $blog->slug) }}"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
                                    </span>
                                    <span class="author-meta">
                                        <span class="post-name"><a href="{{ route('site.blog.author_details', $blog->slug) }}">{{ $blog->author_name }}</a></span><br/>
                                        <span class="post-date">{{ $post->created_at->diffForHumans() }}</span><span class="dot"></span><span class="post-read">6 min read</span>
                                    </span>
                                    <span class="post-read-more">
                                        <a href="{{ route('site.blog.post.details', [$blog->slug, $post->slug]) }}">
                                            <i class="fa-solid fa-book-open h5"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                There is no posts right now. Please come back later.
            </div>
        @endif
    </section>
</div>

@endsection