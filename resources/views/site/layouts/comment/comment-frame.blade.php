<div class="comment-card">
    <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
    <div class="comment-text-wrapper d-flex flex-column" x-data='{openCommentBox: false, comment: "{{ str_replace(['"', "'"], '', $comment->comment) }}"}'>
        <div class="text-wrap">
            <a href="{{ route('site.friend.details', $comment->user_id) }}" class="text-decoration-none text-white">
                <h6>
                    {{ $comment->User->name }}
                </h6>
            </a>
            <span 
                id="contact_1" 
                x-show="!openCommentBox"
                x-transition:enter.duration.500ms
                x-text="comment"
                @keyup.escape.window="openCommentBox = false"
            >
            </span>
            <div 
                x-cloak x-show="openCommentBox" 
                x-transition:enter.duration.500ms
                class="py-2 editCommentBox"
            >
                <div class="textarea-container">
                    <textarea id="" rows="1" placeholder="Add Comment..."  name="comment" class="comment-box" x-model="comment" required></textarea>
                    <a id="edit-comment-click" class="edit-comment-submit button" href="#" @click="openCommentBox=false,comment=comment" data-url="{{ route('site.post.comment.update', [$comment->post_id, $comment->id]) }}">
                        <i class="fa-solid fa-paper-plane"></i>
                    </a>
                </div>
                <a class="edit-modal-cancel-btn" style="cursor: pointer" @click="openCommentBox = false">Esc to Cancel</a>
            </div>
        </div>
        <div class="comment-time d-flex gap-3 align-items-center">
            <p>{{ $comment->acsr_created_at }}</p>
            @if ($comment->User->id == auth()->user()->id)
                <a class="text-decoration-none text-info" style="cursor: pointer" @click="openCommentBox = true">Edit</a>
                <a class="text-decoration-none text-warning" style="cursor: pointer" @click="postId ={{ $comment->post_id }}; commentId={{ $comment->id }}; openCommentDeleteModal = !openCommentDeleteModal" >Delete</a>
            @endif
        </div>
    </div>
</div>