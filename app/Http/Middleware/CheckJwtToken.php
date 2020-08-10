<?php

namespace App\Http\Middleware;

use App\Exceptions\UnauthorizedHttpException;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckJwtToken
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws UnauthorizedHttpException
     */
    public function handle($request, Closure $next)
    {
        if (!JWTAuth::getToken() || JWTAuth::check() === false) throw new UnauthorizedHttpException();

        # 通过
        return $next($request);
    }
}
