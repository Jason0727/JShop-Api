<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 状态
     */
    const STATUS_NO = 0; # 关闭
    const STATUS_YES = 1; # 开启

    /**
     * 层级
     */
    const LEVEL_ZERO = 0; # 顶级
    const LEVEL_FIRST = 1; # 第一级
}
