<?php

namespace App\Http\Controllers\Site\Post;

use App\Models\Site\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Site\Post\PostComment;
use App\Http\Requests\Site\PostCommentRequest;

class PostCommentsController extends Controller
{
    public function comment(PostCommentRequest $request, Post $post)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment
        ];

        $comment = PostComment::create($data);
        
        return response()->json(['success' => 'Like post successfully!']);
    }
}
