<form action="{{ route('site.profile.password', Auth::guard('user_auth')->user()->username) }}" id="password-update-form" method="POST">
    @csrf
    @method('PUT')
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
        <div class="col d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input show-pass-btn shadow-none" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label text-white" for="flexCheckChecked">
                    Show Password
                </label>
            </div>
            <a href="" class="text-info text-decoration-none fw-bold">Forgot password?</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-info btn-sm profile-edit-btn ms-3">Submit</button>
        </div>
    </div>
</form>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\PasswordSettingRequest', '#password-update-form') !!}
    <script>
        $(function(){
            $('.show-pass-btn').on('change', function () {
                if($(this).is(':checked')){
                    return $('input:password').attr('type', 'text');
                }else{
                    return $('input:text').attr('type', 'password');
                }
            })
        })
    </script>
@endpush