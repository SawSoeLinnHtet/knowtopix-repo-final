@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb ml-0">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Posts</div>
            </div>
        </div>
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Posts</h1>
        </div>

        <div class="section-body">
            @if($posts->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Content</th>
                                <th>User Name</th>
                                <th>Privacy</th>
                                <th>Status</th>
                                <th>Likes</th>
                                <th>Comments</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td style="width: 600px">
                                        <p
                                            x-data="{ isCollapsed: false, maxLength: 100, originalContent: '', content: '' }"
                                            x-init="originalContent = $el.firstElementChild.textContent.trim(); content = originalContent.slice(0, maxLength)"
                                        >
                                            <span 
                                                x-text="isCollapsed ? originalContent : content"
                                            >
                                                {{ $post->content_area }}
                                            </span>
                                            <button
                                                class="btn btn-link text-warning p-0"
                                                @click="isCollapsed = !isCollapsed"
                                                x-show="originalContent.length > maxLength"
                                                x-text="isCollapsed ? 'Show less' : 'Show more'"
                                            ></button>
                                        </p>
                                    </td>
                                    <td>
                                        {{ $post->User->name }}
                                    </td>
                                    <td>
                                        {{ $post->acsr_post_privacy_value }}
                                    </td>
                                    <td>
                                        <a 
                                            class="status-btn badge {{ $post->status == 'active' ? 'badge-success' : 'badge-danger text-white' }} mb-2"
                                            data-url="{{ route('admin.posts.status', $post->id) }}"
                                        >
                                            {{ $post->acsr_post_status_value }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.posts.likes.index', $post->id) }}" class="text-info">{{ $post->Like->count() }}<i class="fas fa-chevron-circle-down"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.posts.comments.index', $post->id) }}" class="text-info">{{ $post->Comment->count() }}<i class="fas fa-chevron-circle-down"></i></a>
                                    </td>
                                    <td>
                                        {{ $post->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline">
                                            <a href="#" data-url="{{ route('admin.posts.show', $post->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right mt-3">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="alert alert-warning">No record found</div>
            @endif
        </div>
    </section>
</div>

@push('script')
    <script>
        $(document).on('click', '.status-btn', function(e){
            e.preventDefault();
            console.log('hello post')
            
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
    </script>
@endpush

@endsection
