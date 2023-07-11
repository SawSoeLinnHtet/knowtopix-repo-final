<div class="add-post-btn-wrap" x-data="{ openCreateModalBox : false }" x-init="$watch('openCreateModalBox', toggleOverflow)">
    <button class="add-text-btn" @click="openCreateModalBox = !openCreateModalBox">What do you have in mind?</button>

    <div 
        class="post-create-modal-box" 
        x-cloak x-show="openCreateModalBox"
        @click.away="openCreateModalBox = !openCreateModalBox"
        @keyup.escape.window="openCreateModalBox = false"
    >
        <div 
            class="modal-box-wrapper" 
            x-show="openCreateModalBox"
            x-transition:enter.duration.500ms
            x-transition:leave.duration.400ms
        >
            <div class="modal-box-contain">
                <div class="modal-header">
                    <p></p>
                    <p class="modal-title">
                        Create Status
                    </p>
                    <p class="close-btn" @click="openCreateModalBox = !openCreateModalBox">
                        <i class="fa-solid fa-xmark"></i>
                    </p>
                </div>
                <div class="modal-form-wrap">
                    <form action="{{ route('site.posts.store') }}" id="post-create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-area">
                            <label for="">What do you have in mind?</label>
                            {{-- <input type="text" name="content_area" id=""> --}}
                            <textarea name="content_area" class="content_area" rows="3"></textarea>
                        </div>
                        <div class="form-input">
                            <div class="preview">
                                <img id="file-ip-1-preview">
                            </div>
                            <label for="file-ip-1">
                                <i class="fa-solid fa-image icon"></i>
                                <span>Browse to Upload Image</span>
                            </label>
                            <input type="file" name="thumbnail" id="file-ip-1" onchange="showPreview(event);">
                        </div>
                        <div class="input-area">
                            <button class="btn btn-sm btn-primary py-2" type="submit">Submit</button>
                        </div>
                    </form>
                    @push('script')
                        {!! JsValidator::formRequest('App\Http\Requests\Site\PostRequest', '#post-create') !!}
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

<script>
    function toggleOverflow() {
        document.getElementById('app').classList.toggle('overflow-hidden');
    }
</script>

@endpush