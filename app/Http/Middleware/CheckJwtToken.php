<?php

namespace App\Http\Middleware;

use App\Constant\ApiConstant;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class CheckJwtToken
{
    public function handle($request, Closure $next)
    {
        try {
            # 检测Token是否有效
            if (JWTAuth::parseToken()->check() === true) throw new Exception('token invalid');
            # 设置用户信息
        } catch (Exception $exception) {
            return response()->json(['code' => ApiConstant::FAILED, 'msg' => $exception->getMessage()]);
        }

        return $next($request);
    }
}
