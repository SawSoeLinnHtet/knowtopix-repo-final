<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\ProfileRequest;
use App\Http\Requests\Site\ProfileUploadRequest;
use App\Http\Requests\Site\PasswordSettingRequest;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $auth_user = User::findOrFail(Auth()->user()->id);

        

        $posts = Post::where('user_id', $auth_user->id)->with('User:id,name,username', 'PostComment.User:id,name')->latest()->get();
        $liked_posts = Post::getWithLike($posts);
        $blogs = Blog::where('user_id', auth()->user()->id)->with('Category')->get();

        return view('site.profile.index', ['user' => $auth_user, 'posts' => $posts, 'blogs' => $blogs]);
    }

    public function viewSetting()
    {
        $auth_user = Auth::user();

        return view('site.profile.setting', ['user' => $auth_user]);
    }

    public function update(User $user, ProfileRequest $request)
    {
        $auth_user = $user->findOrFail(Auth::user()->id);
        $auth_user->update($request->except(['_token, _method']));

        return redirect()->back()->with('success', 'Profile Updated successfully');
    }

    public function updatePassword(User $user, PasswordSettingRequest $request)
    {
        $auth_user = $user->findOrFail(auth()->user()->id);

        if (Hash::check($request->old_password, $auth_user->password)) {
            $auth_user->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Old password not match with credential');
        }
    }

    public function upload(ProfileUploadRequest $request, User $user)
    {
        $auth_user = $user->findOrFail(auth()->user()->id);
    
        $imageName = "";
        if (isset($request->profile)) {
            $imageName = time() . '-' . $request->profile->getClientOriginalName();

            $request->profile->move(public_path('images/profile'), $imageName);
        }

        $auth_user->update([
            'username' => 'dog',
            'profile' => $imageName
        ]);
    
        return redirect()->back()->with('success', 'Profile uploaded successfully!');
    }
}
