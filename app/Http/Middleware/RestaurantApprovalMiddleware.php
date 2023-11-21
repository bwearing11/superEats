<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RestaurantApprovalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        //If you are approved it's fine
        if ($user && $user->user_type === 'restaurant' && $user->approved) {
            return $next($request);
        }

        return redirect()->route('restaurants.show', ['id'=> $user->id])->with('error', 'Your restaurant is not approved. Please wait for approval before adding or removing dishes.');
        
    }
}
