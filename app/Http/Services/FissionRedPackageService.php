<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-07
 * Time: 10:56
 */

namespace App\Http\Services;


use App\Constant\OptionConstant;
use App\Models\FissionRedPackageRecord;
use App\Models\Option;
use Carbon\Carbon;

class FissionRedPackageService
{
    /**
     * 获取红包裂变活动
     *
     * @param int $userId
     * @return array|bool
     */
    public static function getFissionActivity(int $userId = 0)
    {
        # 活动配置
        $fissionRedPackageConfig = self::getFissionRedPackageConfig();
        $data = [];
        if ($fissionRedPackageConfig !== false) {
            # 获取活动
            $fissionRedPackageActivity = self::getFissionRedPackageActivity();
            if (!empty($fissionRedPackageActivity)) {
                if ($userId > 0) {
                    # 检测是否有未过期的活动
                    $fissionRedPackageRecord = FissionRedPackageRecord::query()->where([
                        ['user_id', '=', $userId],
                        ['parent_id', '=', 0],
                        ['is_expire', '=', FissionRedPackageRecord::IS_EXPIRE_NO],
                        ['is_finish', '=', FissionRedPackageRecord::IS_FINISH_NO],
                    ])->first();
                    if ($fissionRedPackageRecord) {
                        if (Carbon::now()->timestamp > Carbon::parse($fissionRedPackageRecord->expire_time)->timestamp) {
                            $fissionRedPackageRecord->setExpired();
                        }
                    }
                }
                $data = $fissionRedPackageActivity; # 未登录、已登录未参与、已登录已参与已过期，直接返回红包活动
            }
        }

        return $data;
    }


    /**
     * 获取裂变红包活动配置
     *
     * @return bool|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function getFissionRedPackageConfig()
    {
        # 配置
        $fissionRedPackageConfig = Option::getOne(OptionConstant::FISSION_RED_PACKAGE_CONFIG);
        if ($fissionRedPackageConfig === false) return false;
        $data = $fissionRedPackageConfig->decode();

        # 状态判断
        if ($data['status'] != 1) return false;

        return $data;
    }

    /**
     * 获取裂变红包活动
     *
     * @return bool
     */
    public static function getFissionRedPackageActivity()
    {
        # 配置
        $fissionRedPackageActivity = Option::getOne(OptionConstant::FISSION_RED_PACKAGE_ACTIVITY);
        if ($fissionRedPackageActivity === false) return false;

        # 数据处理
        $data = $fissionRedPackageActivity->decode();
        isset($data['style']) && $data['style'] && $data['style'] = json_decode($data['style'], true);

        return $data;
    }
}