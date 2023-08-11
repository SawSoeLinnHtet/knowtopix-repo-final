@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Staffs</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create New User</a>
            </div>
        </div>

        <div class="section-body">
            <div class="">
                <table class="myTable table table-bordered" style="width:100%; margin: 0px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Join Date</th>
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

@endsection

@push('script')
    <script>
        $(function () {
            var table = $('.myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.users.index') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        render: function (data, type, row, meta) {
                            var x = meta.row + 1;
                            return x;
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {
                        data: 'status', 
                        name: 'status',
                        render: function (data, type, row) {
                            var statusUrl = "{{ route('admin.users.status', ':id') }}".replace(':id', row.id)
                            return `
                                <a class="status-btn badge ${ data ? 'badge-success' : 'badge-danger text-white' } status-btn mb-2" data-url="${ statusUrl }">${ data ? 'Active' : 'Banned' }</a>
                                `
                        }
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
                            var editUrl = "{{ route('admin.users.edit', ':id') }}".replace(':id', row.id);
                            var deleteUrl = "{{ route('admin.users.destroy', ':id') }}".replace(':id', row.id);
                            var showUrl = "{{ route('admin.users.show', ':id') }}".replace(':id', row.id);
                            return `
                                <div class="dropdown d-inline">
                                    <a href="${showUrl}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                    <a href="${editUrl}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                    @component('components.admin.delete-btn', ['action' => '${deleteUrl}'])
                                    @endcomponent
                                </div>
                            `;
                        },
                    },
                ]
            });
            $(document).on('click', '.status-btn', function(e){
                e.preventDefault();                
                Swal.fire({
                    title: 'Account Status Control',
                    text: "You will control this user's account status!",
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
                                '_token': '{{ csrf_token() }}'
                            },
                            type: 'POST',
                            success: function(res){
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
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