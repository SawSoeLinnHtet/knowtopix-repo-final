<form action="{{ route('site.profile.edit') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row mb-3">
        <div class="col-3">
            <label for="mame" class="text-white">Name</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="text" id="name" class="w-100" name="name" value="{{ $user->name }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for=""  class="text-white">Username</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="text" class="w-100" name="username" value="{{ $user->username }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for=""  class="text-white">Email</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="text" class="w-100" name="email" value="{{ $user->email }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for=""  class="text-white">Phone</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="text" class="w-100" name="phone" value="{{ $user->phone }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for=""  class="text-white">Gender</label>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input shadow-none" {{ $user->gender == 'male' ? 'checked' : '' }} type="radio" name="gender" id="inlineRadio1" value="male">
                <label class="form-check-label text-white" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input shadow-none" {{ $user->gender == 'female' ? 'checked' : '' }} type="radio" name="gender" id="inlineRadio2" value="female">
                <label class="form-check-label text-white" for="inlineRadio2">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input shadow-none" {{ $user->gender == 'other' ? 'checked' : '' }} type="radio" name="gender" id="inlineRadio2" value="other">
                <label class="form-check-label text-white" for="inlineRadio2">Other</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for=""  class="text-white">Address</label>
        </div>
        <div class="col edit-input-wrap">
            <textarea id="exampleFormControlTextarea1" rows="3">{{ $user->address }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for=""  class="text-white ">Personal Info</label>
        </div>
        <div class="col edit-input-wrap">
            <textarea id="exampleFormControlTextarea1" rows="3">{{ $user->personal_info }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary profile-edit-btn ms-3">Edit</button>
        </div>
    </div>
</form>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\ProfileRequest') !!}
@endpush