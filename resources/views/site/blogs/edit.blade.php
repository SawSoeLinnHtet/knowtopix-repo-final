@extends('site.layouts.app')

@section('content')
    <div class="container-fluid p-0 pb-5">
        <div class="row position-relative">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="create-blog-form-wrap">
                    <p class="back-btn h6 text-decoration-none text-secondary">
                        <i class="fa-solid fa-arrow-left-long me-2"></i><a href="{{ route('site.profile.index', auth()->user()->id) }}" class="text-decoration-none text-secondary">Back</a>
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
                        <form action="{{ route('site.blog.update', $blog->id) }}" method="POST" id="blog-edit" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="input-frame">
                                <div class="blog-form-input-wrap">
                                    <div class="mb-3">
                                        <input class="form-control form-control-md" id="formFileSm" type="file" name="logo">
                                        <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                            - This file uploader is to upload your blog logo, your brand image.
                                        </span>
                                        <img src="{{ asset('images/blogs/logo/'.$blog->logo) }}" alt="" class="img-fluid img-thumbnail mt-2" style="width: 200px !important">
                                    </div>
                                </div>
                                <div class="blog-form-input-wrap mb-3">
                                    <select class="form-select form-select-md" aria-label=".form-select-lg example" name="category_id">
                                        <option disabled selected>Choose your blog category</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $key }}" {{ $key == $blog->category_id ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                    <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                        - Choose your blog category for user experience, user can find with category easily.
                                    </span>
                                </div>
                                <div class="blog-form-input-wrap mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control shadow-none" name="title" id="title" placeholder="Enter your blog title" value="{{ $blog->title }}">
                                        <label for="title">Blog Title (Required)</label>
                                    </div>
                                    <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                        - Use the name of your business, brand or organization, or a name that helps explain your Page.
                                    </span>
                                </div>
                                <div class="blog-form-input-wrap mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control shadow-none" name="author_name" id="author_name" placeholder="Enter your name" value="{{ $blog->author_name }}">
                                        <label for="author_name">Author Name (Required)</label>
                                    </div>
                                    <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                        - Use the name of your author name who create this blog and write this blog's post.
                                    </span>
                                </div>
                                <div class="blog-form-input-wrap mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control shadow-none" name="author_bios" id="author_bios" style="height: 100px" placeholder="Enter your bios">{{ $blog->author_bios }}</textarea>
                                        <label for="author_bios">Author Bios (Required)</label>
                                    </div>
                                    <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                        - End user can know who you are and what specialize you are.
                                    </span>
                                </div>
                                <div class="blog-form-input-wrap mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control shadow-none" name="email" id="email" placeholder="@example.com" value="{{ $blog->email }}">
                                        <label for="email">Author Email (Required)</label>
                                    </div>
                                    <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                        - End user can contact with this emaill
                                    </span>
                                </div>
                                <div class="blog-form-input-wrap mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control shadow-none" placeholder="Leave a comment here" name="description" id="description" style="height: 100px">{{ $blog->description }}</textarea>
                                        <label for="description">Blog Description</label>
                                    </div>
                                    <span class="d-block text-secondary mt-2" style="font-size: 12px">
                                        - End user can know your blog's main things and this blog's quality.
                                    </span>
                                </div>
                                <div class="blog-form-input-wrap">
                                    <div class="blog-input-wrap pe-2">
                                        <button type="submit" class="w-100 submit-btn">Edit Your Blog</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @push('script')
                            {!! JsValidator::formRequest('App\Http\Requests\BlogEdit', '#blog-edit') !!}
                        @endpush
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
