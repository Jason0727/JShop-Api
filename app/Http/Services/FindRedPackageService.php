<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-07
 * Time: 10:56
 */

namespace App\Http\Services;


use App\Constant\OptionConstant;
use App\Models\FindRedPackageConfig;
use App\Models\FindRedPackageRecord;
use App\Models\Option;
use Carbon\Carbon;

class FindRedPackageService
{
    /**
     * 获取发现红包活动
     *
     * @param int $userId
     * @return array|bool
     */
    public static function getFindActivity(int $userId = 0)
    {
        # 活动配置
        $findRedPackageConfig = self::getFindRedPackageConfig();
        $data = [];
        if ($findRedPackageConfig !== false) {
            # 获取活动
            $findRedPackageActivityOption = self::getFindRedPackageActivityOption();
            if (!empty($findRedPackageActivityOption)) {
                if ($userId > 0) {
                    # 检测是否有未过期的活动
                    $findRedPackageRecord = FindRedPackageRecord::query()->where([
                        ['config_id', '=', $findRedPackageConfig->id],
                        ['user_id', '=', $userId],
                        ['parent_id', '=', 0],
                        ['is_expire', '=', FindRedPackageRecord::IS_EXPIRE_NO],
                        ['is_finish', '=', FindRedPackageRecord::IS_FINISH_NO],
                    ])->first();
                    if ($findRedPackageRecord) {
                        if (Carbon::now()->timestamp > Carbon::parse($findRedPackageRecord->expire_time)->timestamp) {
                            $findRedPackageRecord->setExpired();
                        }
                    }
                }
                $data = $findRedPackageActivityOption; # 未登录、已登录未参与、已登录已参与已过期，直接返回红包活动
            }
        }

        return $data;
    }

    /**
     * 获取发现红包活动配置
     *
     * @return bool|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function getFindRedPackageConfig()
    {
        # 配置
        $findRedPackageConfig = FindRedPackageConfig::query()
            ->where('status', FindRedPackageConfig::STATUS_YES)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        return $findRedPackageConfig ?? false;
    }

    /**
     * 获取发现红包活动可选配置
     *
     * @return bool
     */
    public static function getFindRedPackageActivityOption()
    {
        # 配置
        $findRedPackageActivityOption = Option::getOne(OptionConstant::FIND_RED_PACKAGE_ACTIVITY);
        if ($findRedPackageActivityOption === false) return false;

        # 数据处理
        $data = $findRedPackageActivityOption->decode();
        isset($data['style']) && $data['style'] && $data['style'] = json_decode($data['style'], true);

        return $data;
    }
}