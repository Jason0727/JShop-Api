<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    /**
     * 状态
     */
    const STATUS_NO = 0; # 下架
    const STATUS_YES = 1; # 上架
}
