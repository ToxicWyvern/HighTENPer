<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle($request, Closure $next) //de functie die checked of iemand een admin is of niet
    {
        if (auth()->check()) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
