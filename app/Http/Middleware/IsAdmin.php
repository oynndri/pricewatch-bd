<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = session('user');
        if ($user && ($user['role'] ?? '') === 'admin') {
            return $next($request);
        }
        return response()->json(['error' => 'Admin access required'], 403);
    }
}
