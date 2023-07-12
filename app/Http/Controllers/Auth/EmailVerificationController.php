<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Notifications\RegistrationNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        if(!$request->hasValidSignature()) {
            return view('auth.verification.expired');
        }

        $user = User::findOrFail($request->user_id);

        if($user->hasVerifiedEmail()) {
            return redirect()->route('site.login.index');
        }

        $user->markEmailAsVerified();

        $this->destroyResend();

        return redirect()->route('verification.success');
    }

    public function notice()
    {
        return view('auth.verification.notice');
    }

    public function sent()
    {
        return view('auth.verification.sent');
    }
    
    public function success()
    {
        return view('auth.verification.success');
    }

    public function resend()
    {
        $user = User::findOrFail(session('resend')['id']);

        $user->notify(new RegistrationNotification());

        return redirect()->route('verification.sent');
    }

    private function destroyResend()
    {
        session()->forget('resend');
    }
}
