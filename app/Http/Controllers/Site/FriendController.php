<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Site\Post;
use App\Models\Site\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\PostTypes;

class FriendController extends Controller
{
    public function addUser(User $user)
    {
        $to_user = $user->id;
        $from_user = Auth::user()->id;

        $data = [
            'from_user' => $from_user,
            'to_user' => $to_user
        ];

        Friend::create($data);

        return response()->json(['success' => 'Friend add successfully']);
    }
    
    public function index(Request $request)
    {
        $current_user_id = Auth::user()->id;
        $pending_user_ids = Friend::where('from_user', $current_user_id)->pluck('to_user')->toArray();
        $suggested_user_ids = Friend::where('to_user', $current_user_id)->pluck('from_user')->toArray();
        
        $request_user_ids = Friend::where('to_user', $current_user_id)->where('status', 'pending')->pluck('from_user');
        $requested_users = User::orderByRaw('RAND()')->whereIn('id', $request_user_ids)->get();
        
        $users = User::GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids);

        if ($request->ajax()) {

            $view = view('site.layouts.suggest-friend-card', ['users' => $users])->render();

            return response()->json(['html' => $view]);
        }

        return view('site.friends.index', ['request_users' => $requested_users, 'users' => $users]);
    }

    public function confirmRequest($id, Request $request)
    {
        $friend = Friend::where('from_user', $id)->where('to_user', Auth::user()->id)->first();
        
        $friend->update($request->except('_token'));

        return response()->json(['success' => 'Now you are friend with him']);
    }

    public function show(User $user)
    {
        $friend = Friend::where('from_user', auth()->user()->id)->where('to_user', $user->id)->where('status', 'accept')
                        ->orWhere('from_user', $user->id)->where('to_user', auth()->user()->id)->where('status', 'accept')->first();

        $posts = Post::where('user_id', $user->id)->where('privacy', PostTypes::PUBLIC)->with('PostComment.User:id,name')->latest()->get();
        
        $is_friend = false;
        if(isset($friend)){
            $posts = $posts->merge(Post::where('user_id', $user->id)->where('privacy', PostTypes::FRIEND_ONLY)->with('PostComment.User:id,name')->latest()->get());
            $user->is_friend = true;   
        }

        $posts = $posts->sortByDesc('created_at');

        $liked_posts = Post::getWithLike($posts);

        return view('site.friends.details', ['user' => $user, 'posts' => $posts]);
    }
}
