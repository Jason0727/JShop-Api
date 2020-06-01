<?php

namespace App\Http\Middleware;

use App\Constant\ApiConstant;
use App\Model\Platform;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class CheckPlatform
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            # 平台参数校验
            $platformId = $request->get('platform_id', '');
            if (empty($platformId)) throw new Exception('参数有误');
            # 平台校验
            $platform = Platform::query()->where('id', $platformId)->first();
            if (empty($platform)) throw new Exception('平台不存在');
            # 校验是否开启
            if ($platform->status == Platform::STATUS_NO) throw new Exception('平台已关闭');

            # 通过
            return $next($request);
        } catch (Exception $exception) {
            die(apiResponse(ApiConstant::AUTH_ERROR, $exception->getMessage()));
        }
    }
}