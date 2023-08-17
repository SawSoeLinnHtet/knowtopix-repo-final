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
                        @if(count($staffs) !== 0)
                            @foreach ($staffs as $key => $staff)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $staff->name }}
                                    </td>
                                    <td>
                                        {{ $staff->email }}
                                    </td>
                                    <td>
                                        <a class="status-btn badge {{ $staff->status == 'active' ? 'badge-success' : 'badge-danger text-white' }} status-btn mb-2">{{ $staff->status == 'active' ? 'Active' : 'Banned' }}</a>
                                    </td>
                                    <td>
                                        {{ $staff->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.staffs.show', $staff->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('admin.staffs.edit', $staff->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                        <x-admin.delete-btn action="{{ route('admin.staffs.destroy', $staff->id) }}"/>
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
                <div class="float-right mt-3">
                    {{ $staffs->links() }}
                </div>
            </div>
        </div>
    </section>
</div>

@push('script')
    <script src="{{ asset('backend/js/page/index.js') }}"></script>
@endpush

@endsection