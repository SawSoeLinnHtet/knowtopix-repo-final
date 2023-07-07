<div class="form-group row">
    {!! Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'col-sm-3 col-form-label'], false) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control border-1 border-info', 'placeholder' => 'Enter Your Name']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('email', 'Email Address <span class="text-danger">*</span>', ['class' => 'col-sm-3 col-form-label'], false) !!}
    <div class="col-sm-9">
        {!! Form::email('email', null, ['class' => 'form-control border-1 border-info', 'placeholder' => 'Enter Your Email']) !!}
    </div>
</div>

@if(!$disabled)
    <div class="form-group row">
        {!! Form::label('password', 'Password <span class="text-danger">*</span>', ['class' => 'col-sm-3 col-form-label', 'disabled' => 'disabled'], false) !!}
        <div class="col-sm-9">
            {!! Form::password('password', ['class' => 'form-control border-1 border-info', 'placeholder' => 'Enter Your Password']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('password_confrimation', 'Password Confirmation <span class="text-danger">*</span>', ['class' => 'col-sm-3 col-form-label'], false) !!}
        <div class="col-sm-9">
            {!! Form::password('password_confirmation',  ['class' => 'form-control border-1 border-info', 'placeholder' => 'Repeat Your Password']) !!}
        </div>
    </div>
@endif

<div class="form-group row">
    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-3 col-form-label'], false) !!}
        <div class="col-sm-9">
            <div class="form-check form-check-inline">
            {!! Form::radio('gender', 'male', true) !!}
            {!! Form::label('Male', 'male', ['class' => 'col-sm-3 col-form-label'], false,) !!}
        </div>
        <div class="form-check form-check-inline">
            {!! Form::radio('gender', 'female', true) !!}
            {!! Form::label('Female', 'female', ['class' => 'col-sm-3 col-form-label'], false) !!}
        </div>
        <div class="form-check form-check-inline">
            {!! Form::radio('gender', 'other', true) !!}
            {!! Form::label('Other', 'other', ['class' => 'col-sm-3 col-form-label'], false) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('phone', 'Phone Number', ['class' => 'col-sm-3 col-form-label'], false) !!}
    <div class="col-sm-9">
        {!! Form::text('phone', null, ['class' => 'form-control border-1 border-info', 'placeholder' => 'Enter Your Phone Number']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('address', 'Address', ['class' => 'col-sm-3 col-form-label'], false) !!}
    <div class="col-sm-9">
        {!! Form::textarea('address', null, ['class' => 'form-control border-1 border-info', 'placeholder' => 'Enter Your Adderss']) !!}
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

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\StaffRequest') !!}
@endpush