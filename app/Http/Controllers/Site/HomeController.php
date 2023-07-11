<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Site\Post;
use App\Models\Site\Friend;
use Illuminate\Http\Request;
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

        $posts = Post::orderBy('updated_at','desc')->orderByRaw("FIELD(user_id, $friend_ids)DESC")->with('User:id,name,profile', 'PostComment.User:id,name,profile')->paginate(10);

        $liked_posts = Post::getWithLike($posts);

        if ($request->ajax()) {
            $view = view('site.layouts.public-post-card', ['posts' => $posts])->render();

            return response()->json(['html' => $view]);
        }

        $users = User::GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids);

        return view('site.home', ['posts' => $posts, 'users' => $users->random(5)]);
    }
}
