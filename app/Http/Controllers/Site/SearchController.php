<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Site\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site\Friend;

class SearchController extends Controller
{
    public function index()
    {  
        if(request('search')){
            $users = User::filter(request()->all())->get();
            $friend_users = Friend::friendCheck($users);

            $posts = Post::with('PostComment.User:id,name')->latest()->filter(request()->all())->get();
            $liked_posts = Post::getWithLike($posts);

            return view('site.search.index', ['users' => $users, 'posts' => $posts]);
        }else{
            $recent_posts = Post::with('PostComment.User:id,name')->get()->random(2);
            $liked_posts = Post::getWithLike($recent_posts);

            $recent_users = User::get()->whereNotIn('id', auth()->guard('user_auth')->user()->id)->random(2);
            $friend_users = Friend::friendCheck($recent_users);
            
            return view('site.search.index', ['recent_users' => $recent_users, 'recent_posts' => $recent_posts]);
        }
    }
}
