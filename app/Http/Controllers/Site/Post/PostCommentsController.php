<?php

namespace App\Http\Controllers\Site\Post;

use App\Models\Site\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Site\Post\PostComment;
use App\Http\Requests\Site\PostCommentRequest;
use App\Models\Enums\StatusTypes;

class PostCommentsController extends Controller
{
    public function comment(PostCommentRequest $request, Post $post)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment,
            'status' => StatusTypes::ACTIVE
        ];

        $comment = PostComment::create($data);
        
        return response()->json(['data' => ['success' => 'Like post successfully!', 'comment' => $comment]]);
    }

    public function update(Request $request ,Post $post, PostComment $comment)
    {
        $data = $request->validate([
            'comment' => 'required'
        ]);

        $current_user_id = auth()->user()->id;

        if($comment->post_id == $post->id && $comment->user_id == $current_user_id){
            $comment->update($request->except($data));

            return response()->json(['success' => 'Successfully Updated']);
        }
    }

    public function destroy(Post $post, PostComment $comment)
    {
        $current_user_id = auth()->user()->id;

        if($post->id == $comment->post_id && $current_user_id == $comment->user_id){
            $comment->delete();

            return response()->json(['success' => "Successfully Deleted"]);
        }
    }
}
