<?php

namespace App\Http\Middleware;

use App\Abilities;
use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if(\Gate::allows(Abilities::IS_ADMIN)){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
