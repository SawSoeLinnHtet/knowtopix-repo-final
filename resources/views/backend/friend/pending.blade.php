@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Friends</h1>
        </div>

        <div class="section-body">
            <div class="table-responsive">
                <table class="myTable table table-bordered table-striped table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From User Name</th>
                            <th>To User Name</th>
                            <th>Created At</th>
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
            ajax: "{{ route('admin.friends.pending') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    render: function (data, type, row, meta) {
                        var x = meta.row + 1;
                        return x;
                    }
                },
                {data: 'from_users', name: 'from_users'},
                {data: 'to_users', name: 'to_users'},
                {
                    data: 'created_at', 
                    name: 'created_at', 
                    render: function (data) {
                        return moment(data).fromNow();
                    }
                },
            ]
        });
    })
</script>
@endpush
