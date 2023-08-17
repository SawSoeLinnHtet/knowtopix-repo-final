@extends('site.blogs.layouts.app')

@section('content')

    <div class="container-fluid bg-white m-0">
        <div class="row mx-5">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-md-offset-2">
                <div class="mainheading">
                    <div class="row post-top-meta authorpage">
                        <div class="col-md-10 col-xs-12">
                            <h1>{{$blog->author_name}}</h1>
                            <span class="author-description">
                                {{ $blog->author_bios }}
                            </span>
                            <span class="d-flex align-items-center mt-2">
                                <i class="fa-solid fa-envelope mr-2"></i><span class="text-primary">{{ $blog->email }}</span>
                            </span>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <img class="author-thumb" src="{{ asset('images/blogs/logo/artist-logo.png') }}" alt="Sal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.blogs.author-footer')
@endsection