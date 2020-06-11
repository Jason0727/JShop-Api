<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * 行政区划级别
     */
    const COUNTRY = 'COUNTRY'; # 国家
    const PROVINCE = 'PROVINCE'; # 省
    const CITY = 'CITY'; # 市
    const DISTRICT = 'DISTRICT'; # 县/区
}
