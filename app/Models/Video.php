<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use traits\SerializeDateTrait;

class Video extends Model
{
    use SerializeDateTrait;

    /**
     * 状态
     */
    const STATUS_NO = 0; # 关闭
    const STATUS_YES = 1; # 开启
}
