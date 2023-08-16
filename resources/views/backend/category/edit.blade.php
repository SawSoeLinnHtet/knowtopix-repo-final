@extends('backend.layouts.app');

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Category</h1>
            <div class="section-header-breadcrumb">
                <button class="btn btn-icon icon-left btn-primary go_back">Back</button>
            </div>
        </div>

        <div class="section-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category->id]]) !!}
                @method('PATCH')
            
                <div class="form-group row">
                    {!! Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'col-sm-3 col-form-label'], false) !!}
                    <div class="col-sm-9">
                        {!! Form::text('name', null, ['class' => 'form-control border-1 border-info', 'placeholder' => 'Enter Your Name' ]) !!}
                    </div>
                </div>
                <div class="form-group row justify-content-end pr-3">
                    <button type="submit" class="btn btn-primary btn-md">
                        Submit
                    </button>
                    <button class="btn btn-secondary btn-md ml-3">
                        Cancel
                    </button>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
</div>

@endsection