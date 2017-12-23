<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) // $request get the URL and 'Closure $next' use the request using return
    {
        if (Auth::check()) {
            return $next($request);
        } else {
          return redirect('/login');
        }

    }
}
