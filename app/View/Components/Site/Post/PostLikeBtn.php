<?php

namespace App\View\Components\Site\Post;

use Illuminate\View\Component;

class PostLikeBtn extends Component
{
    public $post_id;
    public $like_user_id;
    public function __construct($postId, $likeUserId)
    {
        $this->post_id = $postId;
        $this->like_user_id = $likeUserId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.post.post-like-btn');
    }
}
