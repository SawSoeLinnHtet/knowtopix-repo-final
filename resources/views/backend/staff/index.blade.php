@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Staffs</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.staffs.create') }}" class="btn btn-primary">Create New Staff</a>
            </div>
        </div>

        <div class="section-body">
            <div class="">
                <table class="myTable table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
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

@push('script')
    <script src="{{ asset('backend/js/page/index.js') }}"></script>

    <script>
        $(function () {
            var table = $('.myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.staffs.index') }}",
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
                    {data: 'email', name: 'email'},
                    {
                        data: 'status', 
                        name: 'status',
                        render: function (data, type, row) {
                            return `
                                <a class="status-btn badge ${ data == 'active' ? 'badge-success' : 'badge-danger text-white' } status-btn mb-2">${ data == 'active' ? 'Active' : 'Banned' }</a>
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
                            var editUrl = "{{ route('admin.staffs.edit', ':id') }}".replace(':id', row.id);
                            var deleteUrl = "{{ route('admin.staffs.destroy', ':id') }}".replace(':id', row.id);
                            var showUrl = "{{ route('admin.staffs.show', ':id') }}".replace(':id', row.id);
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
        })
    </script>
@endpush

@endsection