<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use App\Models\Enums\PostTypes;
use App\Models\Enums\StatusTypes;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $current_auth_user = auth()->user();
        if(request('search')){
            $users = User::filter(request()->all())->where('status', '!=', StatusTypes::BANNED)->get();
            $friend_users = Friend::friendCheck($users);

            $friend_users_id = $current_auth_user->acsr_accept_friend;

            $public_posts = Post::where('privacy', PostTypes::PUBLIC)->where('status', '!=', StatusTypes::BANNED)->with('PostComment.User:id,name')->latest()->filter(request()->all())->get();
            $friend_posts = Post::whereIn('user_id', $friend_users_id)->where('status', '!=', StatusTypes::BANNED)->where('privacy', PostTypes::FRIEND_ONLY)->with('PostComment.User:id,name')->latest()->filter(request()->all())->get();
            $posts = $friend_posts->merge($public_posts);
            $liked_posts = Post::getWithLike($posts);
            
            return view('site.search.index', ['users' => $users, 'posts' => $posts]);
        }else{
            $recent_posts = Post::whereNotIN('user_id', [$current_auth_user->id])->where('privacy', PostTypes::PUBLIC)->where('status', '!=', StatusTypes::BANNED)->with('PostComment.User:id,name')->get()->random(2);
            $liked_posts = Post::getWithLike($recent_posts);

            $recent_users = User::get()->where('status', '!=', StatusTypes::BANNED)->whereNotIn('id', auth()->user()->id)->random(2);
            $friend_users = Friend::friendCheck($recent_users);
            
            return view('site.search.index', ['recent_users' => $recent_users, 'recent_posts' => $recent_posts]);
        }
    }
}
