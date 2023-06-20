<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has the admin role
        if (Auth::check() && Auth::user()->role == 'admin') {
            // Allow the request to proceed
            return $next($request);
        }

        // Otherwise, redirect to the home page with a message
        return redirect('/guest')->with('message', 'You are not an admin');
    }
}