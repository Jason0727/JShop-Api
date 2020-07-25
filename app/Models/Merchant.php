<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    /**
     * 是否营业
     */
    const IS_OPEN_NO = 0;# 否
    const IS_OPEN_YES = 1;# 是

    /**
     * 是否被系统关闭
     */
    const IS_LOCK_NO = 0; # 否
    const IS_LOCK_YES = 1; # 是

    /**
     * 状态
     */
    const REVIEW_WAIT = 0; # 待审核
    const REVIEW_SUCCESS = 1; # 审核通过
    const REVIEW_FAIL = 0; # 审核拒绝

    /**
     * 是否推荐
     */
    const IS_RECOMMEND_NO = 0; # 否
    const IS_RECOMMEND_YES = 1; # 是
}
