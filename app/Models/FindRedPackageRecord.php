<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FindRedPackageRecord extends Model
{
    /**
     * 批量插入可写字段
     *
     * @var array
     */
    protected $fillable = [
        'config_id',
        'user_id',
        'parent_id',
        'user_num',
        'total_money',
        'money',
        'use_minimum',
        'expire_days',
        'expire_time',
        'distribute_type',
        'is_expire',
        'is_finish',
    ];
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

    /**
     * 关联用户模型
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 关联配置模型
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function config()
    {
        return $this->belongsTo(FindRedPackageConfig::class, 'config_id', 'id');
    }
}
