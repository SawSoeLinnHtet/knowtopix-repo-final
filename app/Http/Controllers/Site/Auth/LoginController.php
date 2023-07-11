<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\Auth\LoginRequest;


class LoginController extends Controller
{
    public function index(){

        return view(('site.auth.login'));

    }

    public function auth(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        $remember = isset($request->remember) && $request->remember == 'on';
        if(Auth::guard('user_auth')->attempt($credentials, $remember)){
            return redirect()->route('site.index')->with('success', 'Welcome, You are logged in!');
        }else{
            return redirect()->route('site.login.index')->with('error', "Your Credentials doesn't match");
        }
    }

    public function logout(){

        Auth::guard('user_auth')->logout();

        return redirect()->route('site.login.index');

    }
}
