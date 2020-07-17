<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-07-10
 * Time: 13:54
 */

namespace App\Http\Services;


use App\Constant\OptionConstant;
use App\Models\Banner;
use App\Models\HomeNav;
use App\Models\Notice;
use App\Models\Option;

class HomeService
{
    /**
     * 获取首页模块
     *
     * @return array
     */
    public static function getModuleList()
    {
        $data = Option::getOne(OptionConstant::HOME_PAGE_MODULE);
        if ($data === false) return [];

        $data = $data->decode();

        # 数据处理
        $result = [];
        foreach ($data as $item) {
            if (stripos($item['name'], 'block-') !== false) { # 图片魔方
                list($name, $blockId) = explode('-', $item['name']);
                $result[] = ['name' => $name, 'block_id' => $blockId];
            } elseif (stripos($item['name'], 'single_cat-') !== false) { # 单一分类
                list($name, $catId) = explode('-', $item['name']);
                $result[] = ['name' => $name, 'cat_id' => $catId];
            } elseif (stripos($item['name'], 'video-') !== false) { # 视频
                list($name, $videoId) = explode('-', $item['name']);
                $result[] = ['name' => $name, 'video_id' => $videoId];
            } else {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * 获取导航轮播/广告位
     *
     * @param string $scene
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getBannerList(string $scene)
    {
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

    /**
     * 获取首页导航ICON
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getHomeNavList()
    {
        $platform = app('platform');

        $data = HomeNav::query()->select([
            'name',
            'pic_url',
            'open_type',
            'link_url',
            'appid',
        ])->where([
            ['status', '=', HomeNav::STATUS_YES],
            ['platform_id', '=', $platform->id]
        ])
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return $data;
    }

    /**
     * 获取首页公告
     *
     * @return array
     */
    public static function getHomeNotice()
    {
        return Notice::query()->select(['id', 'content', 'created_at'])->where([
            ['type', '=', Notice::TYPE_HOME],
            ['status', '=', Notice::STATUS_YES]
        ])->first() ?: [];
    }
}