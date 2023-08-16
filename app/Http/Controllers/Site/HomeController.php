<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Post;
use App\Models\Friend;
use Illuminate\Http\Request;
use App\Models\Enums\PostTypes;
use App\Http\Controllers\Controller;
use App\Models\Enums\StatusTypes;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, User $user)
    {
        $current_user_id = Auth::user()->id;
        $pending_user_ids = Friend::where('from_user', $current_user_id)->where('status', 'accept')->pluck('to_user')->toArray();
        $suggested_user_ids = Friend::where('to_user', $current_user_id)->where('status', 'accept')->pluck('from_user')->toArray();

        $ids = array_merge([$current_user_id], $pending_user_ids, $suggested_user_ids);

        $friend_ids = implode(',', $ids);
        $friends = array_merge($pending_user_ids, $suggested_user_ids);

        $user_posts = Post::where('privacy', PostTypes::FRIEND_ONLY )->where('user_id', auth()->user()->id)->where('status', '!=' , StatusTypes::BANNED)->pluck('id')->toArray();
        $public_posts = Post::where('privacy', PostTypes::PUBLIC)->pluck('id')->where('status', '!=', StatusTypes::BANNED)->toArray();
        $friend_posts = Post::whereIn('user_id', $friends)->where('privacy', PostTypes::FRIEND_ONLY)->where('status', '!=', StatusTypes::BANNED)->pluck('id')->toArray();
        
        $post_ids = array_merge($user_posts, $friend_posts, $public_posts);
        shuffle($post_ids);
        $posts = Post::with(['PostComment', 'PostLike'])
            ->whereIn('id', $post_ids)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $liked_posts = Post::getWithLike($posts);

        if ($request->ajax()) {
            $view = view('site.layouts.public-post-card', ['posts' => $posts])->render();

            return response()->json(['html' => $view]);
        }

        $users = User::GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids);
        
        return view('site.home', ['posts' => $posts, 'users' => $users->random(5)]);
    }

    private function setResend($id)
    {
        session(['resend' => ['id' => $id]]);
    }
}
