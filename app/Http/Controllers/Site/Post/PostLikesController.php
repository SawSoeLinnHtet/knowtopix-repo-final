<?php

namespace App\Http\Controllers\Site\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PostLike;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostLikesController extends Controller
{
    public function like(Post $post)
    {
        $user_id = Auth::user()->id;
        $current = PostLike::findByUserAndPost($post->id, $user_id);

        $data = [
            'user_id' => $user_id,
            'post_id' => $post->id
        ];

        if(!isset($current)){
            PostLike::create($data);

            Session::put(['success' => 'Liked!']);
            Session::forget('success');
            return response()->json(['result' => 'Post like success']);
        }else{

            PostLike::destroy($current->id);

            return response()->json(['result' => 'Post unlike success']);
        }
    }
}
