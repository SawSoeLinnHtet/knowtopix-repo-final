<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Site\Friend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteUserController extends Controller
{
    public function randomUser()
    {
        $current_user_id = Auth::guard('user')->user()->id;
        $pending_user_ids = Friend::where('from_user', $current_user_id)->where('status', 'accept')->pluck('to_user')->toArray();
        $suggested_user_ids = Friend::where('to_user', $current_user_id)->where('status', 'accept')->pluck('from_user')->toArray();

        $users = User::GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids);

        $view = view('site.layouts.random-user', ['users' => $users->random(5)])->render();

        return response()->json(['success' => 'Post are sending', 'html' => $view]);
    }

}
