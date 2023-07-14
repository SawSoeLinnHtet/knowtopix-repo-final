<div 
    class="profile-upload-modal-wrap" 
    x-cloak x-show="openProfileUpload"
    @keyup.escape.window="openProfileUpload = false"
>
    <div 
        class="profile-upload-modal modal-form-wrap" 
        x-show="openProfileUpload"
        @click.away="openProfileUpload = false"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <div class="title-wrap">
            <h3>
                Upload
            </h3>
            <button class="close-btn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
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