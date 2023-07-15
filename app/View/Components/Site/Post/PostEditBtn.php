<?php

namespace App\View\Components\Site\Post;

use Illuminate\View\Component;

class PostEditBtn extends Component
{
    public $post_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($postId)
    {
        $this->post_id = $postId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.post.post-edit-btn');
    }
}
