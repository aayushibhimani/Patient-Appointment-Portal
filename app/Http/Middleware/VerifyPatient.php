<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPatient
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
        if(!auth()->user()->isPatient()){
            return redirect(abort(401));
        }
        return $next($request);
    }
}
