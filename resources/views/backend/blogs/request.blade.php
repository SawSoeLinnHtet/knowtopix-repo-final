@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Blogs Request</h1>
        </div>

        <div class="section-body">
            <div class="table-responsive w-100">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author Name</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Requested At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $blog)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $blog->title }}
                                </td>
                                <td>
                                    {{ $blog->author_name }}
                                </td>
                                <td>
                                    {{ $blog->User->name }}
                                </td>
                                <td>
                                    {{ $blog->acsr_blog_request_status }}
                                </td>
                                <td>
                                    {{ $blog->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <x-admin.blogs-action action="{{ route('admin.blogs.request.reject', $blog->id) }}" status="reject"/>
                                    <x-admin.blogs-action action="{{ route('admin.blogs.request.accept', $blog->id) }}" status="accept"/>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection