@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb ml-0">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Users</div>
            </div>
        </div>
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Staffs</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create New User</a>
            </div>
        </div>

        <div class="section-body">
            @if($users->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Join Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    {{ $user->gender }}
                                </td>
                                <td>
                                    @if($user->status)
                                        <div class="badge badge-success">Active</div>
                                    @else
                                        <div class="badge badge-danger">No active</div>
                                    @endif
                                </td>
                                <td>
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline-block">
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
                    {{ $users->links() }}
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