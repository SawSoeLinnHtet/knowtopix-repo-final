<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Admin\Post;
use App\Http\Controllers\Controller;
use App\Models\Admin\PostLike;

class LikeController extends Controller
{
    public function index(Post $post)
    {
        $likes = PostLike::where('post_id', $post->id)->paginate(10);
        return view('backend.post.like.index', ['likes' => $likes]);
    }
}
