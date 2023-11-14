<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $roles)
    {
        $user = auth()->user();

        if ($user && in_array($user->role_id, explode('|', $roles))) {
            return $next($request);
        }

        return abort(403, 'Unauthorized');
    }
}
