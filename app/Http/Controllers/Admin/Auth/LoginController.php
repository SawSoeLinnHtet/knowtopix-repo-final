<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.auth.login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|between:8,20'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = isset($request->remember) && $request->remember == 'on' ? true : false;
        $user = Staff::where('email', $request->email)->first();

        if(Auth::guard('staff')->attempt($credentials, $remember)){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login.index')->with('error', "Your Credentials doesn't match");
    }

    public function logout()
    {
        Auth::guard('staff')->logout();

        return redirect()->route('admin.login.index');
    }
}
