<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantCommonCategory extends Model
{
    /**
     * 状态
     */
    const STATUS_NO = 0; # 关闭
    const STATUS_YES = 1; # 开启
}
