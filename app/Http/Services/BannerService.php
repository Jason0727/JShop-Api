<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-07-10
 * Time: 13:54
 */

namespace App\Http\Services;

use App\Models\Banner;

class BannerService
{
    /**
     * 获取导航轮播/广告位
     *
     * @param string $scene
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getBannerList(string $scene)
    {
        # 平台
        $platform = app('platform');
        $data = Banner::query()
            ->where([
                ['platform_id', '=', $platform->id],
                ['scene', '=', $scene]
            ])
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->makeHidden(['id', 'platform_id', 'sort', 'scene', 'created_at', 'updated_at', 'deleted_at']);

        return $data;
    }
}