@foreach ($comments as $comment)
    <div class="comment-card mb-2">
        <img src="{{ $comment->User->acsr_check_profile }}" alt="">
        <div class="text-wrap">
            <a href="">
                <h6>
                    {{ $comment->User->name }}
                </h6>
            </a>
            <span>
                {{ $comment->comment }}
            </span>
        </div>
    </div>
@endforeach