<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-28
 * Time: 17:43
 */

namespace App\Http\Controllers\Store\Base;


use App\Constant\ApiConstant;
use App\Http\Services\StoreService;

class ConfigController
{
    /**
     * 商城配置
     *
     * ConfigController constructor.
     */
    public function __invoke()
    {
        # 服务器默认图片
        $serviceDefaultImgData = StoreService::getServiceDefaultImg();
        # 小程序标题
        $pageTitle = StoreService::getPageTitle();
        # 商城配置
        $storeConfig = StoreService::getStoreConfig();
        # 返回数据
        $data = [
            'app_img' => $serviceDefaultImgData,
            'page_title' => $pageTitle,
            'store' => $storeConfig
        ];

        return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $data);
    }
}