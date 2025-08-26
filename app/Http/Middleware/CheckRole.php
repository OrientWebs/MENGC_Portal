<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class CheckRole
{
    /**
     * Author: Ye Htun
     * Date : 2024-08-22
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(401); // Unauthorized
        }
        if (Gate::denies('dashboard-access')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        if ($user->roles->isEmpty()) {
            abort(403, 'No roles assigned'); // Forbidden
        }

        if (!$user->roles->contains(fn($role) => $role->is_active)) {
            abort(403, 'Inactive role'); // Forbidden
        }
        if (!$user->is_active) {
            abort(403, 'Inactive This User'); // Forbidden
        }

        return $next($request);
    }
}
