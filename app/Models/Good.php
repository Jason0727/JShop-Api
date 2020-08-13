<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use SoftDeletes;

    /**
     * 状态
     */
    const STATUS_NO = 0; # 下架
    const STATUS_YES = 1; # 上架

    /**
     * 类型
     */
    const TYPE_NORMAL = 0; # 正常商品
    const TYPE_BARGAIN = 1; # 砍价商品

    /**
     * 是否热销
     */
    const IS_HOT_NO = 0; # 否
    const IS_HOT_YES = 1; # 是

    /**
     * 是否参与会员折扣
     */
    const IS_MEMBER_DISCOUNT_NO = 0; # 否
    const IS_MEMBER_DISCOUNT_YES = 1; # 是

    /**
     * 是否加入快捷购买
     */
    const IS_QUICK_PURCHASE_NO = 0; # 否
    const IS_QUICK_PURCHASE_YES = 0; # 是
}
