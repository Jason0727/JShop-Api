<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTitle extends Model
{
    /**
     * 查询所有小程序标题
     *
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll(array $column = ['*'])
    {
        $data = self::query()->get($column);

        return $data;
    }
}
