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
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login.login');
        }

        $user = Auth::user();

        if ($user->role == $role) {
            return $next($request);
        }

    return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
}

}