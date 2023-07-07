@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb ml-0">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Layout</a></div>
                <div class="breadcrumb-item">Default Layout</div>
            </div>
        </div>
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Staffs</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.staffs.create') }}" class="btn btn-primary">Create New Staff</a>
            </div>
        </div>

        <div class="section-body">
            @if($staff_members->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Join Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff_members as $key=>$staff)
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
                                    {{ $staff->phone }}
                                </td>
                                <td>
                                    {{ $staff->gender }}
                                </td>
                                <td>
                                    @if($staff->status)
                                        <div class="badge badge-success">Active</div>
                                    @else
                                        <div class="badge badge-danger">No active</div>
                                    @endif
                                </td>
                                <td>
                                    {{ $staff->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <a href="{{ route('admin.staffs.show', $staff->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('admin.staffs.edit', $staff->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('admin.staffs.destroy', $staff->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right mt-3">
                    {{ $staff_members->links() }}
                </div>
            @else
                <div class="alert alert-warning">No record found</div>
            @endif
        </div>
    </section>
</div>

@push('script')
    <script src="{{ asset('backend/js/page/index.js') }}"></script>
@endpush

@endsection