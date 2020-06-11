<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 性别
     */
    const SEX_NO = 0; # 保密
    const SEX_MALE = 1; # 男
    const SEX_FEMALE = 1; # 女

    /**
     * 批量赋值字段
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'nickname',
        'avatar_url'
    ];
}
