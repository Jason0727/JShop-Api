<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    /**
     * 类型
     */
    const TYPE_BANNER = 0; # 导航轮播
    const TYPE_ADVERTISEMENT = 1; # 广告位

    /**
     * 场景
     */
    const SCENE_HOME_INDEX = 'HOME_INDEX'; # 首页
}
