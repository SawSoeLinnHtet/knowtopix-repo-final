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
            <div class="table-responsive-sm">
                <table class="myTable table table-bordered" style="width:100%; margin: 0px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Joined Data</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) !== 0)
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <a class="status-btn badge {{ $user->status == 'active' ? 'badge-success' : 'badge-danger text-white' }} status-btn mb-2" data-url="{{ route('admin.users.status', $user->id) }}">{{ $user->status == 'active' ? 'Active' : 'Banned' }}</a>
                                    </td>
                                    <td>
                                        {{ $user->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-icon btn-info"><i class="far fa-eye"></i></a>
                                        <x-admin.delete-btn action="{{ route('admin.users.destroy', $user->id) }}"/>
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
            </div>
            <div class="float-right mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </section>
</div>

@endsection

@push('script')
    <script>
        $(function () {
        
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
                                    'Banned',
                                    'This user has been banned',
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