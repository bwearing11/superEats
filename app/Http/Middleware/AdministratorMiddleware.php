<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has a user_type of 'administrator'
        if ($request->user() && $request->user()->user_type === 'administrator') {
            return $next($request);
        }

        // Redirect to login or unauthorized page
        return redirect('/login'); // You can customize the redirect URL
    }
}
