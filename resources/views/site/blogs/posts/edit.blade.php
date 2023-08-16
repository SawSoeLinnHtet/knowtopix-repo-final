@extends('site.blogs.layouts.app')

@section('content')
<div class="container">
    @include('site.blogs.layouts.create-header', ['title' => "Edit Your Blog's Post"])

    <div class="card" style="background-color: #fff; padding: 30px !important">
        <form action="{{ route('site.blog.post.update', [$blog->slug, $post->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 px-3 mb-3">
                        <h6 class="mb-3">Upload image for your post thmbail (Required)</h6>
                        <input type="file" name="thumbnail" class="form-control-file border border-secondary p-2 rounded-lg" id="exampleFormControlFile1">
                        <img src="{{ asset('images/blogs/posts/'.$post->post_thumbnail) }}" class="img-thumbnail img-fluid mt-2" width="300px" height="auto" alt="">
                </div>
                <div class="col-12 px-3 mb-3">  
                    <h6 class="mb-3">Write your content title (Required)</h6>
                    <input class="form-control" type="text" name="title" value="{{ $post->title }}">
                </div>
                <div class="col-12 px-3 mb-3">
                    <h6 class="mb-3">Write your content description (Required)</h6>
                    <textarea class="form-control" name="description" style="resize: none" rows="5">{{ $post->description }}</textarea>
                </div>
                <div class="col-12 px-3 mb-3">
                    <h6 class="mb-3">Write your content in this field (Required)</h6>
                    <textarea id="editor" name="content" rows="100">
                        {!! $post->content !!}
                    </textarea>
                </div>
                <div class="col-12 px-3 mb-3">
                    <h6 class="mb-3">Do you want to make this post to your featured post?</h6>
                    <select class="form-control" name="is_feature" id="exampleFormControlSelect1">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>       
                <div class="col-12 px-3 d-flex">
                    <button class="btn btn-secondary btn-md back-btn w-50 mr-2" type="submit">Cancel</button>
                    <button class="btn btn-primary btn-md w-50" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor', {
            removePlugins: 'exportpdf'
        } );
    </script>
@endpush