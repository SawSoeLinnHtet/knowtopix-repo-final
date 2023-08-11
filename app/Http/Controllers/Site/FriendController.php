<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Post;
use App\Models\Friend;
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

        $is_pending_friend = Friend::isPendingFriend($user->id);

        if($is_pending_friend){
            $data = [
                'from_user' => $from_user,
                'to_user' => $to_user
            ];

            Friend::create($data);

            return response()->json(['success' => 'Friend add successfully']);
        }
        return response()->json(['success' => 'Already requested']);
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

    public function unfriend(User $user)
    {
        $friend = Friend::getFriendUser($user);

        $friend->delete();

        return response()->json(['success' => 'Unfriend successfully']);
    }

    public function cancel(User $user)
    {
        $friend = Friend::where('from_user', auth()->user()->id)->where('to_user', $user->id)->where('status', 'pending')->first();

        $friend->delete();

        return response()->json(['success' => 'Cancel request successfully']);
    }

    public function show(User $user)
    {    
        $friend = Friend::getFriendUser($user);
        
        $pending_friend = Friend::where('from_user', auth()->user()->id)->where('to_user', $user->id)->where('status', 'pending')->first();
        $requested_friend = Friend::where('from_user', $user->id)->where('to_user', auth()->user()->id)->where('status', 'pending')->first();
    
        $posts = Post::where('user_id', $user->id)->where('privacy', PostTypes::PUBLIC)->with('PostComment.User:id,name')->latest()->get();

        $is_friend = false;
        if(isset($friend)){
            $posts = $posts->merge(Post::where('user_id', $user->id)->where('privacy', PostTypes::FRIEND_ONLY)->with('PostComment.User:id,name')->latest()->get());
            $user->is_friend = 'accept';
        }elseif(isset($pending_friend)){
            $user->is_friend = 'pending';
        }elseif(isset($requested_friend)){
            $user->is_friend = 'requested';
        }else{
            $user->is_friend = false;
        }
        
        $posts = $posts->sortByDesc('created_at');
        $liked_posts = Post::getWithLike($posts);
        return view('site.friends.details', ['user' => $user, 'posts' => $posts]);
    }

    public function confirmRequest(User $user)
    {
        $friend = Friend::where('from_user', $user->id)->where('to_user', Auth::user()->id)->where('status', 'pending')->first();

        $friend->update(['status' => 'accept']);

        return response()->json(['success' => 'Now you are friend with him']);
    }

    public function cancelRequest(User $user)
    {
        $friend = Friend::where('from_user', $user->id)->where('to_user', Auth::user()->id)->where('status', 'pending')->first();

        $friend->delete();

        return response()->json(['success' => 'Cancel request successfully']);
    }
}
