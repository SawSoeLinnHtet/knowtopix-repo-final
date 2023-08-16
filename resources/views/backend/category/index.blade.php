@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create New Category</a>
            </div>
        </div>

        <div class="section-body">
            <div class="table-responsive w-100">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-icon btn-info"><i class="far fa-edit"></i></a>
                                    <x-admin.delete-btn action="{{ route('admin.categories.destroy', $category->id) }}"/>
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