<?php

namespace App\Http\Middleware;

use Closure;

class IsBuyer
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
        if (! $request->user()->user_type('Buyer')) {
            return response()->json(['status'=>401, 'message' => 'You are not buyer user'],401); 
        }
        return $next($request);
    }
}
