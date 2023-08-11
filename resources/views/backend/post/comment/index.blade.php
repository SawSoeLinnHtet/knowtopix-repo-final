@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Post Comments</h1>
        </div>

        <div class="section-body">
            @if($comments->count())
                <div class="table-responsive">
                    <table class="myTable table table-bordered table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Created At</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key => $comment)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                   <td>
                                        {{ $comment->User->name }}
                                   </td>
                                   <td>
                                        {{ $comment->comment }}
                                   </td>
                                   <td>
                                        <a 
                                            class="status-btn badge {{ $comment->status == 'active' ? 'badge-success' : 'badge-danger text-white' }} mb-2"
                                            data-url="{{ route('admin.posts.comments.status', [$comment->post_id, $comment->id]) }}"
                                        >
                                            {{ $comment->acsr_comment_status_value }}
                                        </a>
                                   </td>
                                   <td>
                                        {{ $comment->created_at->diffForHumans() }}
                                   </td>
                                    {{-- <td>
                                        <div class="dropdown d-inline">
                                            <a href="#" data-url="{{ route('admin.posts.show', $post->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        </div>
                                    </td> --}}
                                </tr>                          
                            @endforeach
                        </tbody>
                    </table>
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
                title: 'Comment Status Control',
                text: "You will control this comment's status!",
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
