<?php

namespace App\Model;

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
}
