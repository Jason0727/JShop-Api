<?php

namespace App\Http\Middleware;

use App\Constant\ApiConstant;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class CheckJwtToken
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            # 检测Token是否有效
            if (JWTAuth::parseToken()->check() === false) throw new Exception('Token无效');

            # 通过
            return $next($request);
        } catch (JWTException $JWTException) {
            die(apiResponse(ApiConstant::AUTH_ERROR, "token无效"));
        } catch (Exception $exception) {
            die(apiResponse(ApiConstant::AUTH_ERROR, $exception->getMessage()));
        }
    }
}
