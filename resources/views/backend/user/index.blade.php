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
                                <td class="position-relative">
                                    <a class="status-btn badge {{ $user->status ? 'badge-success' : 'badge-danger text-white' }} status-btn mb-2" @click="accountStatusDropDown=!accountStatusDropDown" data-url="{{ route('admin.users.status', $user->id) }}">{{ $user->status ? 'Active' : 'Banned' }}</a>
                                </td>
                                <td>
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                        <x-admin.delete-btn :action="route('admin.users.destroy', $user->id)"/>
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
    <script>
        $(document).on('click', '.status-btn', function(e){
            e.preventDefault();

            console.log('hello')
            
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
    </script>
@endpush

@endsection