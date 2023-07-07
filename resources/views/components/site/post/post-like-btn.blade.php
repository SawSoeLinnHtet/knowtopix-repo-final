@props(['postId', 'likeUserId'])

    <a class="me-2 button like-btn {{ $like_user_id ? 'text-danger' : 'text-white' }}" href="#" data-url="{{ route('site.post.like', $post_id) }}">
        <i class="fa-solid fa-heart"></i>
    </a>


