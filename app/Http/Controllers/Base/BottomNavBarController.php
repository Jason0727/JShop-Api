<?php

namespace App\Http\Controllers\Base;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\StoreService;
use Illuminate\Http\Request;

class BottomNavBarController extends Controller
{
    /**
     * 底部导航栏配置
     *
     * @param Request $request
     * @return false|string
     */
    public function __invoke(Request $request)
    {
        $data = StoreService::getBottomNavBar();

        return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $data);
    }
}
