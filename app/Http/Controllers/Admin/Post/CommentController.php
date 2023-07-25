<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\PostComment;
use App\Models\Enums\StatusTypes;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {   
        $comments = PostComment::where('post_id', $post->id)->with(['User:id,name'])->paginate(10);
        return view('backend.post.comment.index', ['comments' => $comments]);
    }

    public function changeCommentStatus(Post $post, PostComment $comment)
    {
        if(PostComment::where('post_id', $post->id)->where('id', $comment->id)){
            if ($comment->status == StatusTypes::ACTIVE) {
                $comment->status = StatusTypes::BANNED;

                $comment->save();
                return response()->json(['success' => "Now, Post is banned", 'status' => "Banned!"]);
            } else if ($comment->status == StatusTypes::BANNED) {
                $comment->status = StatusTypes::ACTIVE;

                $comment->save();
                return response()->json(['success' => "Now, Post is active", 'status' => 'Active!']);
            }
        }
    }
}
