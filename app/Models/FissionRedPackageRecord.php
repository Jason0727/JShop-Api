<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FissionRedPackageRecord extends Model
{
    /**
     * 是否过期
     */
    const IS_EXPIRE_NO = 0; # 未过期
    const IS_EXPIRE_YES = 1; # 已过期

    /**
     * 是否完成
     */
    const IS_FINISH_NO = 0; # 未完成
    const IS_FINISH_YES = 1; # 已完成

    /**
     * 设置过期
     *
     * @return $this
     */
    public function setExpired()
    {
        $this->is_expire = self::IS_FINISH_YES;
        $this->save();

        return $this;
    }
}
