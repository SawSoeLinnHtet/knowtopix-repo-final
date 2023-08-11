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

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@push('script')
    <script>
            $(function () {
                var table = $('.myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.posts.index') }}",
                    columns: [
                        {
                            data: 'id',
                            name: 'id',
                            render: function (data, type, row, meta) {
                                var x = meta.row + 1;
                                return x;
                            }
                        },
                        {
                            data: 'content_area', 
                            name: 'content_area',
                            width: '300px',
                        },
                        {data: 'user.name', name: 'user.name'},
                        {data: 'privacy', name: 'privacy'},
                        {
                            data: 'status', 
                            name: 'status',
                            render: function (data, type, row) {
                                var statusUrl = "{{ route('admin.posts.status', ':id') }}".replace(':id', row.id)
                                console.log(data);
                                return `
                                    <a  class="status-btn badge ${ data == 'active' ? 'badge-success' : 'badge-danger text-white'} mb-2" data-url="${statusUrl}">
                                        ${ data == 'active' ? 'Active' : 'Banned' }
                                    </a>
                                `
                            }
                        },
                        {
                            data: 'post_likes',
                            name: 'post_likes',
                        },
                        {
                            data: 'post_comments',
                            name: 'post_comments',
                        },
                        {
                            data: 'created_at', 
                            name: 'created_at', 
                            render: function (data) {
                                return moment(data).fromNow();
                            }
                        },
                        {
                            data: null,
                            name: 'actions',
                            searchable: false,
                            orderable: false,
                            render: function(data, type, row) {
                                var showUrl = "{{ route('admin.posts.show', ':id') }}".replace(':id', row.id);
                                return `
                                    <div class="dropdown d-inline">
                                        <a href="${showUrl}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                    </div>
                                `;
                            },
                        },
                    ]
                });
            })
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
