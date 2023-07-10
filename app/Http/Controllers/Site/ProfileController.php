<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Site\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PasswordSettingRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Site\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $auth_user = Auth::guard('user_auth')->user();

        $posts = Post::where('user_id', $auth_user->id)->with('PostComment.User:id,name')->latest()->get();
        $liked_posts = Post::getWithLike($posts);

        $photos = Post::where('user_id', $auth_user->id)->pluck('thumbnail');

        return view('site.profile.index', ['user' => $auth_user, 'posts' => $posts, 'photos' => $photos]);
    }

    public function setting()
    {
        $auth_user = Auth::guard('user_auth')->user();

        return view('site.profile.setting', ['user' => $auth_user]);
    }

    public function update(User $user, ProfileRequest $request)
    {
        $auth_user = $user->findOrFail(Auth::guard('user_auth')->user()->id);
        $auth_user->update($request->except(['_token, _method']));

        return redirect()->back()->with('success', 'Profile Updated successfully');
    }

    public function updatePassword(PasswordSettingRequest $request)
    {
        dd($request->all());
    }
}
