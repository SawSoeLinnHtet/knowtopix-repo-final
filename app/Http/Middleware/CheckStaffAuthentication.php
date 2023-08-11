<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStaffAuthentication
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('staff')->check()) {
            // Redirect to the staff login page or do whatever you want for staff authentication.
            return redirect()->route('admin.login.index');
        }

        return $next($request);
    }
}

