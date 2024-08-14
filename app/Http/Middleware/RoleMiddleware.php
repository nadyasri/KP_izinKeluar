<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect('/login')->withErrors('Silakan login terlebih dahulu');
    }

    $user = Auth::user();

    if (in_array($user->role, $roles)) {
        return $next($request);
    }

    return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
}

}