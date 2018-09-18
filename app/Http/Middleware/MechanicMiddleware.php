<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class MechanicMiddleware
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
      if ($request->user() && $request->user()->role != 'mechanic'){
        return new Response(view('unauthorized')->with('role','MECHANIC'));
      }
        return $next($request);
    }
}
