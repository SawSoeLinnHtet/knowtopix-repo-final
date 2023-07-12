<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\Auth\LoginRequest;


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

        if(!$user->hasVerifiedEmail()) {
            $this->setResend($user);

            return redirect()->route('site.login.index')->with('unverified', 'Please verify your email to sign in.');
        }

        if(Auth::guard('user')->attempt($credentials, $remember)){
            return redirect()->route('site.index');
        }
        return redirect()->route('site.login.index')->with('error', "Your Credentials doesn't match");
    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect()->route('site.login.index');
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
    
}
