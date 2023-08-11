@extends('site.blogs.layouts.app')

@section('content')
@include('site.blogs.layouts.create-header', ['title' => "Create Your Blog's Post"])

<div class="card" style="background-color: #fff; padding: 30px !important">
    @include('site.blogs.posts.docx-to-html')
    <form action="{{ route('site.blog.post.store', $blog->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 px-3">
                <div class="form-group">
                    <h6 class="mb-3">Upload image for your post thmbail (Required)</h6>
                    <input type="file" name="thumbnail" class="form-control-file border border-secondary p-2 rounded-lg" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="col-12 px-3 mb-3">
                <h6 class="mb-3">Write your content title (Required)</h6>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="col-12 px-3 mb-3">
                <h6 class="mb-3">Write your content description (Required)</h6>
                <textarea class="form-control" name="description" style="resize: none" rows="5"></textarea>
            </div>
            <div class="col-12 px-3 mb-3">
                <h6 class="mb-3">Write your content in this field (Required)</h6>
                <textarea id="content" name="content"></textarea>
            </div>
            <div class="col-12 px-3 d-flex">
                <button class="btn btn-secondary btn-md back-btn w-50 mr-2" type="submit">Cancel</button>
                <button class="btn btn-primary btn-md w-50" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection

@push('script')
    <script>
        $('#paste-button').click(function() {
            $('#docx-form').submit();

            $('#exampleModal').modal('hide');

        });

        $('#docx-form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('site.blog.post.docsToHtml', $blog->slug) }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#content').summernote('pasteHTML', response);
                }
            });
        });

        $('#content').summernote({
            tabsize: 2,
            height: 400,
        });
    </script>
@endpush