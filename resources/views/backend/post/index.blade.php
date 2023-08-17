@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Posts</h1>
        </div>

        <div class="section-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-striped myTable mb-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post Content</th>
                            <th>User</th>
                            <th>Privacy</th>
                            <th>Status</th>
                            <th>Likes</th>
                            <th>Comments</th>
                            <th>Posted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($posts) !== 0)
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        @include('site.layouts.datatable-content-area', ['content_area' => $post->content_area])
                                    </td>
                                    <td>
                                        {{ $post->User->name }}
                                    </td>
                                    <td>
                                        @include('backend.layouts.post-type', ['post' => $post])
                                    </td>
                                    <td>
                                        <a  class="status-btn badge {{ $post->status == 'active' ? 'badge-success' : 'badge-danger text-white'}} mb-2" data-url="{{ route('admin.posts.status', $post->id) }}">
                                            {{ $post->status == 'active' ? 'Active' : 'Banned' }}
                                        </a>
                                    </td>
                                    <td>
                                        @include('backend.layouts.post-relation-quantity', ['action' => route('admin.posts.likes.index', $post->id), 'attributes' => $post->PostLike])
                                    </td>
                                    <td>
                                        @include('backend.layouts.post-relation-quantity', ['action' => route('admin.posts.comments.index', $post->id), 'attributes' => $post->PostComment])
                                    </td>
                                    <td>
                                        {{ $post->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="alert alert-warning text-white">
                                There is no data found!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="w-100 d-flex justify-content-end mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</div>

@push('script')
    <script>
            $(function () {
                $(document).on('click', '.status-btn', function(e){
                    e.preventDefault();
                    
                    Swal.fire({
                        title: 'Post Status Control',
                        text: "You will control this post's status!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            let status_url = $(this).data('url');

                            $.ajax({
                                url: status_url,
                                data: {
                                    '_token': '{{ csrf_token() }}',
                                },
                                type: 'PATCH',
                                success: function(res){
                                    Swal.fire(
                                        res.status,
                                        res.success,
                                        'success'
                                    )
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000); 
                                },
                                error: function(res) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: "Something wrong",
                                        text: res.responseJSON.message
                                    });
                                }
                            })
                        }
                    })
                })
            })
    </script>
@endpush

@endsection
