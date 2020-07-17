<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-02
 * Time: 13:32
 */

namespace traits;

use DateTimeInterface;

trait SerializeDateTrait
{
    /**
     * 日期格式
     *
     * @var
     */
    protected $dateFormat;

    /**
     * 为数组 / JSON 序列化准备日期。
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }
}