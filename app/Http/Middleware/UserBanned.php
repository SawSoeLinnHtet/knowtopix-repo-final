<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Enums\StatusTypes;
use Illuminate\Support\Facades\Auth;

class UserBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->status == StatusTypes::BANNED){
            Auth::logout();
            return redirect()->route('site.login.index')->with('error', 'Your account have been suspended');
        }

        return $next($request);
    }
}
