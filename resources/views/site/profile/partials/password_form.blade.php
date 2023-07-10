<form action="{{ route('site.profile.password') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row mb-3">
        <div class="col-3">
            <label for="old-password"  class="text-white">Old Password</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="password" class="password w-100" id="old-password" name="old_password">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for="new-password"  class="text-white">New Password</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="password" class="password w-100" id="new-password" name="password">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for="confirm-password"  class="text-white">Confirm Password</label>
        </div>
        <div class="col edit-input-wrap">
            <input type="password" class="password w-100" id="confirm-password" name="password_confirmation">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3"></div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input show-pass-btn shadow-none" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label text-white" for="flexCheckChecked">
                    Show Password
                </label>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary profile-edit-btn ms-3">Submit</button>
        </div>
    </div>
</form>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\PasswordSettingRequest') !!}
@endpush