<?php

namespace App\Http\Controllers\Home;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\FindRedPackageService;
use App\Http\Services\HomeService;
use App\Http\Services\StoreService;

class IndexController extends Controller
{
    /**
     * @return false|string
     */
    public function __invoke()
    {
        # 模块
        $module = HomeService::getHomeModuleData();
        # 商城配置
        $store = StoreService::getStoreConfig();
        # 裂变红包活动
        $findRedPackageActivity = FindRedPackageService::getFindActivity($this->userId());

        # 返回
        $data = [
            'module' => $module,
            'store' => $store,
            'find_red_package_activity' => $findRedPackageActivity,
        ];

        return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $data);
    }
}
