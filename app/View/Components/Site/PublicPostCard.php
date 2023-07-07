<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class PublicPostCard extends Component
{
    public $posts;
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function render()
    {
        return view('components.site.public-post-card');
    }
}
