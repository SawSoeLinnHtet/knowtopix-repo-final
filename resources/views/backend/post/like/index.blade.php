@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb ml-0">
                <div class="breadcrumb-item active"><a href="{{ route('admin.posts.index') }}">Posts</a></div>
                <div class="breadcrumb-item">Likes</div>
            </div>
        </div>
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Post Likes</h1>
        </div>

        <div class="section-body">
            @if($likes->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Created At</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($likes as $key => $like)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                   <td>
                                        {{ $like->User->name }}
                                   </td>
                                   <td>
                                        {{ $like->created_at->diffForHumans() }}
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
                <div class="float-right mt-3">
                    {{ $likes->links() }}
                </div>
            @else
                <div class="alert alert-warning">No record found</div>
            @endif
        </div>
    </section>
</div>

@endsection
