<?php

namespace App\Http\Controllers\FindRedPackage;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\FindRedPackageService;
use App\Jobs\FindRedPackageJob;
use App\Models\FindRedPackageRecord;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class OpenController extends Controller
{
    /**
     * 领取红包
     *
     * @return mixed
     */
    public function __invoke()
    {
        return DB::transaction(function () {
            # 活动配置
            $findRedPackageConfig = FindRedPackageService::getFindRedPackageConfig();
            if ($findRedPackageConfig === false) throw new BadRequestHttpException("活动已结束，敬请期待~");

            # 参与记录
            $findRedPackageRecord = FindRedPackageRecord::query()->where([
                ['config_id', '=', $findRedPackageConfig->id],
                ['user_id', '=', $this->userId()],
                ['parent_id', '=', 0],
                ['is_expire', '=', FindRedPackageRecord::IS_EXPIRE_NO],
                ['is_finish', '=', FindRedPackageRecord::IS_FINISH_NO]
            ])->first();
            if (!$findRedPackageRecord) {
                # 领取
                $findRedPackageRecord = FindRedPackageRecord::query()->create([
                    'config_id' => $findRedPackageConfig->id,
                    'user_id' => $this->userId(),
                    'parent_id' => 0,
                    'user_num' => $findRedPackageConfig->user_num,
                    'total_money' => $findRedPackageConfig->total_money,
                    'money' => 0,
                    'use_minimum' => $findRedPackageConfig->use_minimum,
                    'expire_days' => $findRedPackageConfig->expire_days,
                    'expire_time' => Carbon::now()->addHours($findRedPackageConfig->expire_hours)->toDateTimeString(),
                    'distribute_type' => $findRedPackageConfig->distribute_type,
                    'is_expire' => FindRedPackageRecord::IS_EXPIRE_NO,
                    'is_finish' => FindRedPackageRecord::IS_FINISH_NO,
                ]);

                # 追加队列
                FindRedPackageJob::dispatch($findRedPackageRecord);
            }

            return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['red_id' => $findRedPackageRecord->id]);
        });
    }
}
