<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    const STATUS_NO = 0;# 未开启
    const STATUS_YES = 1; # 已开启
}
