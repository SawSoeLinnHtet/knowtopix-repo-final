@extends('backend.layouts.app');

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Staff</h1>
            <div class="section-header-breadcrumb">
                <button class="btn btn-icon icon-left btn-primary go_back">Back</button>
            </div>
        </div>

        <div class="section-body">
            {!! Form::model($staff, ['route' => ['admin.staffs.update', $staff->id]]) !!}
                @method('PATCH')
                @include('backend.staff.partials._form', ['disabled' => true])
            {!! Form::close() !!}
        </div>
    </section>
</div>

@endsection