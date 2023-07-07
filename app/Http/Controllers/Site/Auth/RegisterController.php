<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index(){
        return view('site.auth.register');
    }

    public function store(RegisterRequest $request){
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($data);

        return redirect()->route('site.login.index')->with('success', 'Sign Up Success, Please Sign In');
    }

}
