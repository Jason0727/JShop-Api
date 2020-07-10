<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-07-10
 * Time: 13:54
 */

namespace App\Http\Services;


use App\Constant\OptionConstant;
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
}