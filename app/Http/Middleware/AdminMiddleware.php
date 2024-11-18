<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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
        // Check if the user is an admin
        if (auth()->user() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Redirect if not an admin
        return redirect()->back()->with('error', 'You are not authorized.');
    }
}
