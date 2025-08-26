<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            if ($user && $user->UserStatus != 'Active') {
                Auth::guard('web')->logout();
                $user->SessionId = null;
                $user->ExpiredAt = null;
                $user->save();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            } elseif ($user && $user->SessionId) {
                $extend_login_minutes = config('session.lifetime');
                $extended_expires_at_timestamps = Carbon::now()->addMinutes($extend_login_minutes);
                $user->update([
                    'ExpiredAt' => $extended_expires_at_timestamps,
                ]);
            }
        }
        return $next($request);
    }
}
