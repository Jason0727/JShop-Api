<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadLibrary extends Model
{
    /**
     * 是否启用
     */
    const STATUS_YES = 1; # 启用
    const STATUS_NO = 0; # 禁用

    /**
     * 类型
     */
    const TYPE_DEFAULT = 0; # 默认
    const TYPE_CARTOON = 1; # 卡通
    const TYPE_MASCOT = 2; # 吉祥物
    const TYPE_ANIMAL = 3; # 动物

    public static function getRandomHead(int $type = -1)
    {
        # 搜索条件
        # 1.状态
        $map = [
            ['status', '=', self::STATUS_YES]
        ];
        # 2.类型
        if ($type > -1) {
            $map[] = ['type', '=', $type];
        }

        return self::query()->where($map)->orderByRaw("rand()")->value('head_url') ?: "https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/60.png";
    }
}
