@extends('site.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row position-relative">
            <div class="col-12 col-lg-7 col-xl-7">
                <div class="create-blog-form-wrap">
                    <p class="back-btn h6 text-decoration-none text-secondary">
                        <i class="fa-solid fa-arrow-left-long me-2"></i><a href="#" class="text-decoration-none text-secondary">Back</a>
                    </p>
                    <div class="header pb-1">
                        <h3 class="text-white">
                            Create a Blog
                        </h3>
                        <p class="text-secondary">
                            Your Blog is where people go to learn more about you. Make sure yours has all the information they may need.
                        </p>
                    </div>
                    <div class="blog-form-wrap">
                        <form action="{{ route('site.blog.request.store') }}" method="POST" id="blog-create" enctype="multipart/form-data">
                            @csrf
                            <div class="input-frame">
                                <div class="blog-form-input-wrap">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control shadow-none" name="title" id="title" placeholder="Enter your blog title">
                                        <label for="title">Blog Title (Required)</label>
                                    </div>
                                </div>
                                <div class="blog-form-input-wrap">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control shadow-none" name="author_name" id="author_name" placeholder="Enter your name">
                                        <label for="author_name">Author Name (Required)</label>
                                    </div>
                                </div>
                                <div class="blog-form-input-wrap">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control shadow-none" name="author_bios" id="author_bios" style="height: 100px" placeholder="Enter your bios"></textarea>
                                        <label for="author_bios">Author Bios (Required)</label>
                                    </div>
                                </div>
                                <div class="blog-form-input-wrap">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control shadow-none" name="email" id="email" placeholder="@example.com">
                                        <label for="email">Author Email (Required)</label>
                                    </div>
                                </div>
                                <div class="blog-form-input-wrap">
                                    <x-site.sample-file-input/>
                                </div>
                                <div class="blog-form-input-wrap">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control shadow-none" placeholder="Leave a comment here" name="description" id="description" style="height: 100px"></textarea>
                                        <label for="description">Blog Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-form-input-wrap">
                                <div class="blog-input-wrap pe-2">
                                    <button type="submit" class="w-100 submit-btn">Submit To Admin</button>
                                </div>
                            </div>
                        </form>
                        @push('script')
                            {!! JsValidator::formRequest('App\Http\Requests\BlogRequest', '#blog-create') !!}
                        @endpush
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
