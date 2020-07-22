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
use App\Models\Topic;
use App\Models\Video;

class HomeService
{
    /**
     * 获取首页模块
     *
     * @return array
     */
    private static function getHomeModule()
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
    private static function getHomeBanner()
    {
        $platform = app('platform');

        $data = Banner::query()
            ->select([
                'id',
                'title',
                'pic_url',
                'open_type',
                'link_url',
                'appid'
            ])
            ->where([
                ['platform_id', '=', $platform->id],
                ['type', '=', Banner::TYPE_BANNER],
                ['scene', '=', Banner::SCENE_HOME_INDEX]
            ])
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return $data;
    }

    /**
     * 获取首页导航ICON
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private static function getHomeNav()
    {
        $platform = app('platform');

        $data = HomeNav::query()->select([
            'name',
            'pic_url',
            'open_type',
            'link_url',
            'appid',
        ])
            ->where([
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
    private static function getHomeNotice()
    {
        $platform = app('platform');

        $data = Notice::query()
            ->select([
                'id',
                'name',
                'icon_url',
                'bg_color',
                'color',
                'content'
            ])
            ->where([
                ['platform_id', '=', $platform->id],
                ['type', '=', Notice::TYPE_HOME],
                ['status', '=', Notice::STATUS_YES]
            ])->first() ?: [];

        return $data;
    }

    /**
     * 获取首页专题
     *
     * @return array
     */
    private static function getHomeTopic()
    {
        $data = [];
        # 配置
        $config = Option::getOne(OptionConstant::TOPIC_CONFIG);
        if ($config === false) return [];
        $data['config'] = $config->decode();

        $platform = app('platform');

        # 专题列表
        $topic = Topic::query()
            ->select([
                'id',
                'sub_title',
                'tag_url',
            ])
            ->where([
                ['platform_id', '=', $platform->id],
                ['status', '=', Topic::STATUS_YES],
            ])
            ->limit(5)
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        $data['params'] = $topic;

        return $data;
    }

    /**
     * 获取首页视频
     *
     * @param int $videoId
     * @return array
     */
    private static function getHomeVideo(int $videoId)
    {
        $data = Video::query()
            ->select([
                'id',
                'title',
                'video_url',
                'cover_url'
            ])
            ->where([
                ['id', '=', $videoId]
            ])->first() ?: [];

        return $data;
    }

    // 获取首页推荐商户
    private static function getRecommendMch()
    {

    }

    /**
     * 获取首页模块
     *
     * @return array
     */
    public static function getHomeModuleData()
    {
        # 模块
        $module = self::getHomeModule();
        foreach ($module as &$item) {
            # 模块类型
            switch ($item['name']) {
                # 公告
                case 'notice':
                    $item['params'] = self::getHomeNotice();
                    break;
                # 搜索
                case 'search':
                    break;
                # 轮播图
                case 'banner':
                    $item['params'] = self::getHomeBanner();
                    break;
                # 导航ICON
                case 'nav':
                    $item['params'] = self::getHomeNav();
                    break;
                # 专题
                case 'topic':
                    ($homeTopicData = self::getHomeTopic()) && ($item['config'] = $homeTopicData['config']) && ($item['params'] = $homeTopicData['params']);
                    break;
                # 视频
                case 'video':
                    $item['params'] = self::getHomeVideo($item['video_id']);
                    break;
                # 好店推荐
                case 'mch':
//                    $item['params'] = self::getHomeVideo($item['video_id']);
                    break;
                # 优惠券
                case 'coupon':
                    break;
                # 秒杀
                case 'miaosha':
                    break;
                # 拼团
                case 'pintuan':
                    break;
                # 预约
                case 'yuyue':
                    break;
                # 图片魔方
                case 'block':
                    break;
                # 单一分类
                case 'single_cat':
                    break;
                # 所有分类
                case 'all_cat':
                    break;
            }
        }

        return $module;
    }
}
