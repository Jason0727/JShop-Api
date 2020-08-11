<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * 类型
     */
    const TYPE_DISCOUNT = 1; # 折扣券
    const TYPE_FULL_REDUCE = 2; # 满减券

    /**
     * 是否加入领券中心
     */
    const IS_JOIN_NO = 0; # 否
    const IS_JOIN_YES = 1; # 是

    /**
     * 是否加入积分商城
     */
    const IS_INTEGRAL_NO = 0; # 否
    const IS_INTEGRAL_YES = 1; # 是

    /**
     * 优惠券适用类型
     */
    const APPOINT_TYPE_ALL = 0; # 全场通用
    const APPOINT_TYPE_CATEGORY = 1; # 指定分类
    const APPOINT_TYPE_GOODS = 2; # 指定商品
}
