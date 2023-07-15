 @props(['comments'])

    @foreach ($comments as $key => $comment)
        <div class="comment-card">
            <img src="{{ $comment->User->acsr_check_profile }}" alt="">
            <div class="text-wrap">
                <h6>
                    {{ $comment->User->name }}
                </h6>
                <span>
                    {{ $comment->comment }}
                </span>
            </div>
        </div>
    @endforeach