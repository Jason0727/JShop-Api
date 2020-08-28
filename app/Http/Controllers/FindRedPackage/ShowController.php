<?php

namespace App\Http\Controllers\FindRedPackage;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\FindRedPackageService;
use App\Models\FindRedPackageRecord;
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
        $findRedPackageConfig = FindRedPackageService::getFindRedPackageConfig();
        if ($findRedPackageConfig === false) throw new BadRequestHttpException("活动已结束，敬请期待~");

        # 参与记录
        $findRedPackageRecord = FindRedPackageRecord::query()->where([
            ['config_id', '=', $findRedPackageConfig->id],
            ['user_id', '=', $this->userId()],
            ['parent_id', '=', 0],
            ['is_expire', '=', FindRedPackageRecord::IS_EXPIRE_NO],
            ['is_finish', '=', FindRedPackageRecord::IS_FINISH_NO],
        ])->first();

        # 返回数据
        $data = [
            'rule' => $findRedPackageConfig['rule'],
            'total_money' => $findRedPackageConfig['total_money'],
            'red_id' => $findRedPackageRecord ? $findRedPackageRecord->id : 0
        ];

        # 返回
        return api_response(ApiConstant::SUCCESS, '操作成功', $data);
    }
}
