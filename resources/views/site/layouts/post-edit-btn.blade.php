<li class="post-edit-wrap">
    <a @click="openEditModalBox = !openEditModalBox" class="post-edit-btn" style="cursor: pointer" data-url="{{ route('site.posts.edit', $post->id) }}">
        <i class="fa-solid fa-pen-to-square text-info"></i><span class="fw-bold">Edit</span>
    </a>
</li>