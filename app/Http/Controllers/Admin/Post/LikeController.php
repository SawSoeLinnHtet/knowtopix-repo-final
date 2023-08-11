<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\PostLike;

class LikeController extends Controller
{
    public function index(Post $post)
    {
        $likes = PostLike::where('post_id', $post->id)->get();
        return view('backend.post.like.index', ['likes' => $likes]);
    }
}
