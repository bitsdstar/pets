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
        if ($request->user()->user_type != 'Admin')  {
            return response()->json(['status'=>401, 'message' => 'You are not admin user'],401); 
        }
        return $next($request);
    }
}
