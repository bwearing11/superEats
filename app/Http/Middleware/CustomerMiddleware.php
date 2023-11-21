<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has a user_type of 'customer'
        if ($request->user() && $request->user()->user_type === 'customer') {
            return $next($request);
        }

        // Redirect to login or unauthorized page
        return redirect('/login'); // You can customize the redirect URL
    }
}
