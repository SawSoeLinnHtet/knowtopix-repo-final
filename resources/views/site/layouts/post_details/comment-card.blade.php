@foreach ($comments as $comment)
    <div class="comment-card mb-2">
        <img src="{{ $comment->User->acsr_check_profile }}" alt="">
        <div class="d-flex flex-column" x-data="{openCommentBox: false, comment: '{{ $comment->comment }}'}">
            <div class="text-wrap">
                <a href="{{ route('site.friend.details', $comment->user_id) }}" class="text-decoration-none text-white">
                    <h6>
                        {{ $comment->User->name }}
                    </h6>
                </a>
                <span 
                    id="contact_1" 
                    x-show="!openCommentBox" 
                    x-text="comment" 
                    x-transition:enter.duration.500ms
                    @keyup.escape.window="openCommentBox = false"
                ></span>
                <div 
                    x-cloak x-show="openCommentBox" 
                    x-transition:enter.duration.500ms
                    class="py-2 editCommentBox"
                >
                    <div class="textarea-container">
                        <textarea id="" rows="1" placeholder="Add Comment..."  name="comment" class="comment-box" x-model="comment" required></textarea>
                        <a id="edit-comment-click" class="edit-comment-submit button" href="#" @click="openCommentBox=false,comment=comment" data-url="{{ route('site.post.comment.update', [$comment->post_id, $comment->id]) }}">
                            <svg class="svg-inline--fa fa-paper-plane" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"></path></svg><!-- <i class="fa-solid fa-paper-plane"></i> Font Awesome fontawesome.com -->
                        </a>
                    </div>
                    <a href="#" class="edit-modal-cancel-btn" @click="openCommentBox = false">Esc to Cancel</a>
                </div>
            </div>
            <div class="comment-time d-flex gap-3 align-items-center">
                <p class="text-white">{{ $comment->acsr_created_at }}</p>
                @if ($comment->User->id == auth()->user()->id)
                    <a href="#" class="text-decoration-none text-info" @click="openCommentBox = true">Edit</a>
                    <a href="#" class="text-decoration-none text-warning">Delete</a>
                @endif
            </div>
        </div>
    </div>
@endforeach