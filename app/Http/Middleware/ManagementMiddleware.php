<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class ManagementMiddleware
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
      if ($request->user() && ($request->user()->role == 'accountant' || $request->user()->role == 'admin')){
        return $next($request);
      }
        return new Response(view('unauthorized')->with('role','MANAGEMENT'));
    }
}
