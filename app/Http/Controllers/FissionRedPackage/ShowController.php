<?php

namespace App\Http\Controllers\FissionRedPackage;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\FissionRedPackageService;
use App\Models\FissionRedPackageRecord;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ShowController extends Controller
{
    /**
     * 拆红包页面
     *
     * @param Request $request
     * @return false|string
     */
    public function __invoke(Request $request)
    {
        # 活动配置
        $fissionRedPackageConfig = FissionRedPackageService::getFissionRedPackageConfig();
        if ($fissionRedPackageConfig === false) throw new BadRequestHttpException("活动已结束，敬请期待~");

        # 参与记录
        $fissionRedPackageRecord = FissionRedPackageRecord::query()->where([
            ['config_id', '=', $fissionRedPackageConfig->id],
            ['user_id', '=', $this->userId()],
            ['parent_id', '=', 0],
            ['is_expire', '=', FissionRedPackageRecord::IS_EXPIRE_NO],
            ['is_finish', '=', FissionRedPackageRecord::IS_FINISH_NO],
        ])->first();

        # 返回数据
        $data = [
            'rule' => $fissionRedPackageConfig['rule'],
            'total_money' => $fissionRedPackageConfig['total_money'],
            'red_id' => $fissionRedPackageRecord ? $fissionRedPackageRecord->id : 0
        ];

        # 返回
        return api_response(ApiConstant::SUCCESS, '操作成功', $data);
    }
}
