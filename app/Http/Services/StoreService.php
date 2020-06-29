<?php


namespace App\Http\Services;

use App\Constant\OptionConstant;
use App\Models\Option;
use App\Models\PageTitle;

class StoreService
{
    /**
     * 获取服务器默认图片
     *
     * @return array
     */
    public static function getServiceDefaultImg()
    {
        $data = Option::getOne(OptionConstant::SERVICE_DEFAULT_IMG);

        return $data === false ? [] : $data->decode();
    }

    /**
     * 获取小程序标题
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getPageTitle()
    {
        return PageTitle::getAll(['url', 'title']);
    }

    /**
     * 获取商城配置
     *
     * @return array
     */
    public static function getStoreConfig()
    {
        $data = Option::getOne(OptionConstant::STORE_CONFIG);

        return $data === false ? [] : $data->decode();
    }
}
