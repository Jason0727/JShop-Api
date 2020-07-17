<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use traits\SerializeDateTrait;

class Notice extends Model
{
    use SerializeDateTrait;

    /**
     * 类型
     */
    const TYPE_HOME = 1; # 首页

    /**
     * 状态
     */
    const STATUS_NO = 0; # 关闭
    const STATUS_YES = 1; # 开启
}
