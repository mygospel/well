<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class UserAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    public function handle(Request $request, Closure $next)
    {

        if ( Auth::check() ) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('userlogin');
            
        }


    }
}