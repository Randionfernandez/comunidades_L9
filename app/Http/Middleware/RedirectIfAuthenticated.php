<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> d7b36bbefd2c49b64ba9be84858b50028599f384
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
<<<<<<< HEAD
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
=======
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
>>>>>>> d7b36bbefd2c49b64ba9be84858b50028599f384
        }

        return $next($request);
    }
}
