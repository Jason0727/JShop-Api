<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBlock extends Model
{
    /**
     * 状态
     */
    const STATUS_NO = 0; # 关闭
    const STATUS_YES = 1; # 开启

    /**
     * 样式
     */
    const STYLE_DEFAULT = 0; # 默认
    const STYLE_ONE = 1; # 样式一
    const STYLE_TWO = 2; # 样式二
}
