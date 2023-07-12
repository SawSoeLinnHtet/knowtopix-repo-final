<form action="{{ route('site.posts.update', $post->id) }}" id="post-edit-modal" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="input-area">
        <label for="">What do you have in mind?</label>
        <textarea name="content_area" class="content-area" id="" rows="3">{{ $post->content_area }}</textarea>
    </div>
    <div class="form-input">
        <div class="preview">
            <img id="imgPreview" class="{{ $post->thumbnail ? 'd-block' : '' }}" src="{{ $post->thumbnail ? asset('images/'.$post->thumbnail) : '' }}">
        </div>
        <label for="photo">
            <i class="fa-solid fa-image icon"></i>
            <span>Browse to Upload Image</span>
        </label>
        <input type="file" name="thumbnail" id="photo">
    </div>
    <div class="input-area">
        <button class="btn btn-sm btn-primary py-2" type="submit">Submit</button>
    </div>
</form>