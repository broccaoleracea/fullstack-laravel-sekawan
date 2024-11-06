<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('RoleMiddleware is executing');
        Log::info('Request Path: ' . $request->path());

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($request->is('admin*')) {
            Log::info('log event 2');
            if ($user->user_level !== 'admin') {
                // Redirect to the user dashboard or appropriate user page if not an admin
                return redirect()->route('dashboardSiswa')->with('error', 'Unauthorized access to admin section.');
            }
        } else {
            Log::info('log event 3');
        }

        // If accessing user pages, make sure they have a valid role
        if ($request->is('user*') && $user->user_level !== 'admin' && $user->user_level !== 'anggota') {
            abort(403, 'Unauthorized');
        }

        // Allow access if all checks pass
        return $next($request);
    }
}
