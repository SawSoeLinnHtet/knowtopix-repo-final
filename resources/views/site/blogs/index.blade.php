@extends('site.layouts.app')

@section('content')
    <div class="container p-0">
        <div class="row position-relative">
            <div class="col-12 border-white">
                <div class="search-main-wrap mb-3">
                    <div class="search-tool-wrap">
                        <form action="{{ route('site.blog.index') }}" method="GET">
                            <div class="dropdown d-inline-block">
                                <button class="btn text-white dropdown-toggle shadow-none outline-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </button>
                                <ul class="dropdown-menu pt-3 pb-3" style="background-color: #1E293B">
                                    @foreach ($categories as $key => $category)
                                        <li>
                                            <a class="dropdown-item text-secondary category_select" href="#" value="{{ $key }}">
                                                {{ $category }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <input type="text" placeholder="Type what you search" name="blog_search" value="{{ request('blog_search') }}">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row px-2">
                    @if(isset($blogs) && count($blogs) !== 0)
                        @foreach ($blogs as $key => $blog)
                            <section class="d-flex flex-column position-relative flex-lg-row flex-xl-row mt-3" style="background-color: #1E293B; border-radius: 10px" x-data="{ openBlogOptions: false }">
                                @if(auth()->user()->id == $blog->user_id)
                                    <button class="blogs-options-dropdown" @click="openBlogOptions = !openBlogOptions">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div 
                                        class="blogs-options-dropdown-wrap" 
                                        x-cloak x-show="openBlogOptions"
                                        @click.away="openBlogOptions = false"
                                        x-transition:enter.duration.500ms
                                        x-transition:leave.duration.400ms
                                    >
                                        <ul>
                                            <li>
                                                <a href="{{ route('site.blog.edit', $blog->slug) }}">
                                                    <i class="fa-solid fa-pen-to-square text-info me-3"></i>Edit Blog
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.blog.delete', $blog->id) }}">
                                                    <i class="fa-solid fa-trash text-danger me-3"></i>Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="p-2 col-12 col-lg-4 col-xl-4">
                                    <img src="{{ $blog->acsr_blog_logo }}" alt="" width="100%" height="100%" style="object-fit: cover; border-radius: 10px">
                                </div>
                                <div class="col-12 col-lg-8 col-xl-8 ps-4 py-3 pe-4 position-relative" >
                                    <div class="badge pt-1 pb-2 mb-2" style="background-color: #DB2777">
                                        {{ $blog->Category->name }}
                                    </div>
                                    <h3 class="text-white">
                                        {{ $blog->title }}
                                    </h3>
                                    <div class="blog-details d-flex gap-3 align-items-center">
                                        <p class="text-white">
                                            <i class="fa-solid fa-calendar-days me-2 text-info"></i><span style="font-size: 12px">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}</span>
                                        </p>
                                        <p class="text-secondary">|</p>
                                        <p class="text-white">
                                            <i class="fa-solid fa-user-graduate me-2 text-info"></i><span style="font-size: 12px">{{ $blog->author_name }}</span>
                                        </p>
                                    </div>
                                    <p class="text-secondary">
                                        {{ $blog->description }}
                                    </p>
                                    <div class="w-100 d-flex justify-content-end">
                                        <a href="{{ route('site.blog.details', $blog->slug) }}" target="_blank" class="text-decoration-none text-white mt-5 mb-3 me-3 go-to-blog-btn d-flex align-items-center gap-2">
                                            Go To Blog <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                        </a>
                                    </div>
                                </div>
                            </section>
                        @endforeach
                    @else
                        <div class="noting-alert">
                            <img src="{{ asset('site/img/nothing_found.png') }}" alt="">
                            <h4>
                                No Results Found!
                            </h4>
                            <p class="text-center">
                                Your Search Returned no results. Try shortening or rephrasing your search.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            @include('site.layouts.responsive-menu')
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.category_select').on('click', function(e) {
                e.preventDefault();

                let current_category = $(this).attr('value');
                
                let change_location = "{{ route('site.blog.index') }}";

                window.location = `${change_location}?category_select=${current_category}`;
            });
        })
    </script>
@endpush