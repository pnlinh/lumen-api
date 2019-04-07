<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (preg_match('/pnlinh$/i', $request->getRequestUri())) {
            return response('You shall not pass', Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
