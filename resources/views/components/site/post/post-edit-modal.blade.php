<div 
    class="post-create-modal-box" 
    x-cloak x-show="openEditModalBox"
    @keyup.escape.window="openEditModalBox = false"
>
    <div 
        class="modal-box-wrapper" 
        x-show="openEditModalBox"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <div class="modal-box-contain">
            <div class="modal-header">
                <p></p>
                <p class="modal-title">
                    Edit Status
                </p>
                <p class="close-btn" @click="openEditModalBox = !openEditModalBox">
                    <i class="fa-solid fa-xmark"></i>
                </p>
            </div>
            <div class="modal-form-wrap" id="edit-modal-box-wrap">
                
            </div>
        </div>
    </div>
</div>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\PostRequest', '#post-edit-modal') !!}
@endpush

@push('script')

<script>
    $(document).ready(function () {
        $(document).on('change', '#editPhotoUpload', function () {    
            console.log('hello');
            var file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#editImgPreview").addClass("d-block");
                    $("#editImgPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });  
    })
</script>

@endpush