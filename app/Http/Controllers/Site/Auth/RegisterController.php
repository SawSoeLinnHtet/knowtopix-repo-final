<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\RegistrationNotification;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('site.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $user->notify(new RegistrationNotification());

        $this->setResend($user->id);

        return redirect()->route('verification.sent');
    }

    public function setResend($user)
    {
        session(['resend' => ['id' => $user]]);
    }

}
