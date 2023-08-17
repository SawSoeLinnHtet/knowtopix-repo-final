<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Models\Enums\StatusTypes;

class LoginController extends Controller
{
    public function index()
    {
        return view(('site.auth.login'));
    }

    public function auth(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
    
        $remember = isset($request->remember) && $request->remember == 'on' ? true : false;

        $user = User::where('email', $request->email)->first();

        if(isset($user)){
            if ($user->status == StatusTypes::BANNED) {
                return redirect()->route('site.login.index')->with('error', "Your Account has been suspended");
            }

            if (isset($user)) {
                if (!$user->hasVerifiedEmail()) {

                    $this->setResend($user);

                    return view('auth.verification.notice');
                }
            }

            if (Auth::attempt($credentials, $remember)) {
                return redirect()->back();
            }

            return redirect()->route('site.login.index')->with('error', "Your Credentials doesn't match");
        }

        return redirect()->route('site.login.index')->with('error', "Your Credentials doesn't match");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.login.index')->with('success', 'Logged Out Successfully!');
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
    
}
