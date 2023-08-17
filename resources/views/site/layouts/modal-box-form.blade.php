<form action="{{ route('site.posts.update', $post->id) }}" id="post-edit-modal" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="privacy-area d-flex mb-2" x-data="{ openSelectPrivacy : false, selectedPrivacy : '{{ $post->privacy }}' }">
        <a x-show="selectedPrivacy == 1" @click="openSelectPrivacy = true">
            <i class="fa-solid fa-earth-americas me-2"></i><span style="text-transform: capitalize">Public</span><i class="fa-solid fa-angle-down arrow ms-2"></i>
        </a>
        <a x-show="selectedPrivacy == 2" @click="openSelectPrivacy = true">
            <i class="fa-solid fa-user-group me-2"></i><span style="text-transform: capitalize">Friend Only</span><i class="fa-solid fa-angle-down arrow ms-2"></i>
        </a>
        <a x-show="selectedPrivacy == 3" @click="openSelectPrivacy = true">
            <i class="fa-solid fa-lock me-2"></i><span style="text-transform: capitalize">Private</span><i class="fa-solid fa-angle-down arrow ms-2"></i>
        </a>
        <div 
            class="select-input-modal" 
            x-cloak x-show="openSelectPrivacy"
            x-transition:enter.duration.500ms
            x-transition:leave.duration.400ms
        >
            <div class="header position-relative">
                Post Privacy
                <a href="#" class="back-btn position-absolute top-0 end-0 rounded-circle border-0" @click="openSelectPrivacy = false">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="info-body">
                <div class="descript-wrap">
                    <h5 class="text-white">
                        Who can see your post?
                    </h5>
                    <span class="d-block mt-1">
                        Your post will show up in Feed, on your profile and in search results.
                    </span>
                    <span class="d-block mt-1">
                        Your default audience is set to Only me, but you can change the audience of this specific post.
                    </span>
                </div>
                <div class="radio-wrap pt-3">
                    <div class="value-wrap mb-3">
                        <label for="edit-public-radio" class="d-flex align-items-center">
                            <div class="privacy-icon me-3">
                                <i class="fa-solid fa-earth-americas"></i>
                            </div>
                            Public
                        </label>
                        <input type="radio" name="privacy" id="edit-public-radio" value="1" x-model="selectedPrivacy" checked>
                    </div>  
                    <div class="value-wrap mb-3">
                        <label for="edit-friend-radio" class="d-flex align-items-center">
                            <div class="privacy-icon me-3">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            Friend Only
                        </label>
                        <input type="radio" name="privacy" id="edit-friend-radio" value="2" x-model="selectedPrivacy">
                    </div> 
                    <div class="value-wrap mb-3">
                        <label for="edit-private-radio" class="d-flex align-items-center">
                            <div class="privacy-icon me-3">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            Private
                        </label>
                        <input type="radio" name="privacy" id="edit-private-radio" value="3" x-model="selectedPrivacy">
                    </div> 
                </div>
            </div>
            <div class="modal-footer privacy">
                <a href="#" class="footer-btn bg-secondary" @click="selectedPrivacy={{ $post->privacy }},openSelectPrivacy=false">
                    Cancel
                </a>
                <a href="#" class="footer-btn" @click="getIcon(), openSelectPrivacy=false">
                    Done
                </a>
            </div>
        </div>
    </div>
    <div class="input-area">
        <label for="">What do you have in mind?</label>
        <textarea name="content_area" class="content-area" id="" rows="3">{{ $post->content_area }}</textarea>
    </div>
    <div class="form-input">
        <div class="preview">
            <img id="editImgPreview" class="review {{ $post->thumbnail ? 'd-block' : '' }}" src="{{ $post->thumbnail ? asset('images/'.$post->thumbnail) : '' }}">
        </div>
        <label for="editPhotoUpload">
            <i class="fa-solid fa-image icon"></i>
            <span>Browse to Upload Image</span>
            <input type="file" name="thumbnail" id="editPhotoUpload">
        </label>
    </div>

    <div class="input-area">
        <button class="btn btn-sm btn-primary py-2" type="submit">Submit</button>
    </div>
</form>
