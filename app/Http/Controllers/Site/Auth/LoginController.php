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
        
        if(isset($user)){
            if (!$user->hasVerifiedEmail()) {

                $this->setResend($user);

                return view('auth.verification.notice');
            }
        }

        if(Auth::attempt($credentials, $remember)){
            return redirect()->back();
        }
        return redirect()->route('site.login.index')->with('error', "Your Credentials doesn't match");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.login.index');
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
    
}
