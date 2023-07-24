<?php

namespace App\Http\Controllers\Site;

use App\Enums\PostPrivacyEnum;
use App\Models\User;
use App\Models\Site\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site\Friend;

class SearchController extends Controller
{
    public function index()
    {
        $current_auth_user = auth()->user();
        if(request('search')){
            $users = User::filter(request()->all())->get();
            $friend_users = Friend::friendCheck($users);

            $friend_users_id = $current_auth_user->acsr_accept_friend;

            $public_posts = Post::where('privacy', PostPrivacyEnum::PUBLIC())->with('PostComment.User:id,name')->latest()->filter(request()->all())->get();
            $friend_posts = Post::whereIn('user_id', $friend_users_id)->where('privacy', PostPrivacyEnum::FRIEND())->with('PostComment.User:id,name')->latest()->filter(request()->all())->get();
            $posts = $friend_posts->merge($public_posts);
            $liked_posts = Post::getWithLike($posts);
            
            return view('site.search.index', ['users' => $users, 'posts' => $posts]);
        }else{
            $recent_posts = Post::whereNotIN('user_id', [$current_auth_user->id])->where('privacy', PostPrivacyEnum::PUBLIC())->with('PostComment.User:id,name')->get()->random(2);
            $liked_posts = Post::getWithLike($recent_posts);

            $recent_users = User::get()->whereNotIn('id', auth()->user()->id)->random(2);
            $friend_users = Friend::friendCheck($recent_users);
            
            return view('site.search.index', ['recent_users' => $recent_users, 'recent_posts' => $recent_posts]);
        }
    }
}
