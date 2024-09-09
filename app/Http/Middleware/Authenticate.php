<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
{
    if (!$request->expectsJson()) {
        if (Auth::guard('admin')->check()) {
            return route('admin.dashboard'); // Ensure this route exists
        } elseif (Auth::guard('web')->check()) {
            return route('staff.dashboard'); // User dashboard
        } else {
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            return route('user.login');
        }
    }

    return null;
}

}
