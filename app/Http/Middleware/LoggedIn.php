<?php

namespace App\Http\Middleware;

use Closure;

class LoggedIn
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {  if (session()->has('LoggedUser') && (url(('login')) ==  $request->url())) {
        return back();
    }
    return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');;
    }
}
