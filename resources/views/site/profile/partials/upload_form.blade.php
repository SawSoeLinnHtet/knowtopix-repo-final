<div 
    class="profile-upload-model-wrap" 
    x-cloak x-show="openProfileUpload"
    @click="openProfileUpload = !openProfileUpload"
    @keyup.escape.window="openProfileUpload = false"
>
    <div 
        class="profile-upload-modal modal-form-wrap" 
        x-show="openProfileUpload"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <form action="{{ route('site.profile.upload', Auth::user()->username) }}" method="POST" id="upload-form" enctype="multipart/form-data">
            @csrf
            <div class="form-input">
                <div class="preview">
                    <img id="file-ip-1-preview">
                </div>
                <label for="file-ip-1">
                    <i class="fa-solid fa-image icon"></i>
                    <span>Browse to Upload Image</span>
                </label>
                <input type="file" id="file-ip-1" name="profile" accept="image/*" onchange="showPreview(event);">
            </div>
            <div class="input-area">
                <button class="btn btn-sm btn-primary w-100" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\ProfileUploadRequest', '#upload-form') !!}
@endpush