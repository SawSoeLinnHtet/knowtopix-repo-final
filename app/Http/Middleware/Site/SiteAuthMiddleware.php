<?php

namespace App\Http\Middleware\Site;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteAuthMiddleware
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
        if(Auth::guard('user_auth')->check()){
            return $next($request);
        }

        return redirect()->route('site.login.index')->with('error', 'Login first');
    }
}