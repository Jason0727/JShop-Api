<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeNav extends Model
{
    /**
     * 状态
     */
    const STATUS_NO = 0; # 禁用
    const STATUS_YES = 1; # 启用
}
