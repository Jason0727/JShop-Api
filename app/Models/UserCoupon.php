<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    /**
     * 是否已使用
     */
    const IS_USE_NO = 0; # 否
    const IS_USE_YES = 1; # 是

    /**
     * 领取类型
     */
    const TYPE_PLATFORM = 0; # 平台发放
    const TYPE_AUTO_SEND = 1; # 自动发放
    const TYPE_CENTER_GOT = 2; # 领券中心领取
}
