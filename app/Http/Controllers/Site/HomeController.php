<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Site\Post;
use App\Models\Site\Friend;
use Illuminate\Http\Request;
use App\Models\Site\FriendRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request, User $user){
        $current_user_id = Auth::guard('user_auth')->user()->id;
        $pending_user_ids = Friend::where('from_user', $current_user_id)->where('status', 'accept')->pluck('to_user')->toArray();
        $suggested_user_ids = Friend::where('to_user', $current_user_id)->where('status', 'accept')->pluck('from_user')->toArray();

        $ids = array_merge([$current_user_id], $pending_user_ids, $suggested_user_ids);

        $friend_ids = implode(',', $ids);

        $posts = Post::orderBy('created_at','desc')->orderByRaw("FIELD(user_id, $friend_ids)DESC")->with('User:id,name', 'PostLike', 'PostComment.User:id,name')->paginate(10);

        $liked_posts = $posts->map(function ($post) {
            $post_likes = $post->PostLike;
            $is_liked = false;

            foreach ($post_likes as $like) {
                $is_liked = $like->user_id == auth()->guard('user_auth')->user()->id;
            }

            return $post->is_liked = $is_liked;
        });

        if ($request->ajax()) {
            $view = view('site.layouts.public-post-card', ['posts' => $posts])->render();

            return response()->json(['html' => $view]);
        }

        $users = User::GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids);

        return view('site.home', ['posts' => $posts, 'users' => $users->random(5)]);
    }
}