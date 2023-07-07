@extends('backend.layouts.app');

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
        <div class="section-header">
            <h1>Create Staff</h1>
            <div class="section-header-breadcrumb">
                <button class="btn btn-icon icon-left btn-primary go_back">Back</button>
            </div>
        </div>

        <div class="section-body">
            {!! Form::open(['route' => 'admin.staffs.store']) !!}
                @include('backend.staff.partials._form', ['disabled' => false])
            {!! Form::close() !!}
        </div>
    </section>
</div>

@endsection