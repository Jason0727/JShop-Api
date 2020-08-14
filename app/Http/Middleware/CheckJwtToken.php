<?php

namespace App\Http\Middleware;

use App\Exceptions\UnauthorizedHttpException;
use Closure;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check() === false || !Auth::user()) throw new UnauthorizedHttpException();

        # 通过
        return $next($request);
    }
}
