<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var \App\Models\Auth\User\User $auth */
        $auth = auth()->user();
        
        if (isset($auth) && $auth->isAdmin()) {
            return $next($request);
        }

        return redirect('/');
    }
}
