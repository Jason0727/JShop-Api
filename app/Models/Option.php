<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * 查询单个配置
     *
     * @param string $key
     * @return bool|\Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getOne(string $key)
    {
        if (empty($key)) return false;

        $data = Option::query()->where('key', $key)->first();

        return $data ?? false;
    }

    /**
     * 查询所有配置
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        $data = Option::query()->get();

        return $data;
    }


    /**
     * 生成键值对（key - 标题）
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getTitleWithKey()
    {
        $data = Option::query()->pluck('title', 'key');

        return $data;
    }

    /**
     * 生成键值对（id - 标题）
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getTitleWithId()
    {
        $data = Option::query()->pluck('title', 'id');

        return $data;
    }
}
