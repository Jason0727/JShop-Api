<?php

namespace App\Http\Controllers\Store\Category;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Models\Category;

class IndexController extends Controller
{
    /**
     * 分类
     *
     * @return array|bool
     */
    public function __invoke()
    {
        # 平台
        $platform = app('platform');

        # 二级分类
        $data = Category::query()
            ->where([
                ['platform_id', '=', $platform->id],
                ['status', '=', Category::STATUS_YES],
                ['level', '<=', Category::LEVEL_FIRST],
            ])
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get([
                'id',
                'name',
                'parent_id',
                'pic_url',
                'pic_big_url',
                'advert_pic_url',
                'advert_link_url',
            ]);

        # 递归数据处理
        $result = CategoryService::getCategoryTree($data);

        # 返回
        return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $result);
    }
}
