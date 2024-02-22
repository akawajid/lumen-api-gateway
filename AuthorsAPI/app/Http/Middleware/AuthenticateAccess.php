<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as Response;

class AuthenticateAccess
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
        $accepted_secrets = explode(',', env('ACCEPETED_SECRETS'));
        if(in_array($request->headers->all()['secret'][0], $accepted_secrets)){
            return $next($request);
        }

        abort(Response::HTTP_UNAUTHORIZED);
    }
}
