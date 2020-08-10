<?php

namespace App\Http\Middleware;

use App\Constant\ApiConstant;
use App\Exceptions\PlatformNotAcceptableHttpException;
use App\Models\Platform;
use Closure;
use Exception;

class CheckPlatform
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws PlatformNotAcceptableHttpException
     */
    public function handle($request, Closure $next)
    {
        # 平台参数校验
        $platformId = get_platform_id();
        if (empty($platformId)) throw new PlatformNotAcceptableHttpException();
        # 平台校验
        $platform = Platform::query()->where([
            ['id', '=', $platformId],
            ['status', '=', Platform::STATUS_YES],
        ])->first();
        if (empty($platform)) throw new PlatformNotAcceptableHttpException();
        # 绑定平台对象到容器
        app()->bind('platform', function () use ($platform) {
            return $platform;
        });
        # 通过
        return $next($request);
    }
}
