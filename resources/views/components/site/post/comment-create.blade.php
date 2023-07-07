@props(['id'])

    <textarea id="" rows="1" placeholder="Add Comment..." name="comment" class="comment-box"></textarea>
    <a class="comment-submit button" href="#" data-url="{{ route('site.post.comment', $id) }}">
        <i class="fa-solid fa-paper-plane"></i>
    </a>