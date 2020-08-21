<?php

namespace App\Http\Controllers\FissionRedPackage;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\FissionRedPackageService;
use App\Jobs\FissionRedPackageJob;
use App\Models\FissionRedPackageRecord;
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
            $fissionRedPackageConfig = FissionRedPackageService::getFissionRedPackageConfig();
            if ($fissionRedPackageConfig === false) throw new BadRequestHttpException("活动已结束，敬请期待~");

            # 参与记录
            $fissionRedPackageRecord = FissionRedPackageRecord::query()->where([
                ['config_id', '=', $fissionRedPackageConfig->id],
                ['user_id', '=', $this->userId()],
                ['parent_id', '=', 0],
                ['is_expire', '=', FissionRedPackageRecord::IS_EXPIRE_NO],
                ['is_finish', '=', FissionRedPackageRecord::IS_FINISH_NO]
            ])->first();
            if (!$fissionRedPackageRecord) {
                # 领取
                $fissionRedPackageRecord = FissionRedPackageRecord::query()->create([
                    'config_id' => $fissionRedPackageConfig->id,
                    'user_id' => $this->userId(),
                    'parent_id' => 0,
                    'user_num' => $fissionRedPackageConfig->user_num,
                    'total_money' => $fissionRedPackageConfig->total_money,
                    'money' => 0,
                    'use_minimum' => $fissionRedPackageConfig->use_minimum,
                    'expire_days' => $fissionRedPackageConfig->expire_days,
//                    'expire_time' => Carbon::now()->addHours($fissionRedPackageConfig->single_expire_hours)->toDateTimeString(),
                    'expire_time' => Carbon::now()->addSeconds(10)->toDateTimeString(),
                    'distribute_type' => $fissionRedPackageConfig->distribute_type,
                    'is_expire' => FissionRedPackageRecord::IS_EXPIRE_NO,
                    'is_finish' => FissionRedPackageRecord::IS_FINISH_NO,
                ]);

                # 追加队列
                FissionRedPackageJob::dispatch($fissionRedPackageRecord);
            }

            return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['red_id' => $fissionRedPackageRecord->id]);
        });
    }
}
