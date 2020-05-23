<?php


namespace App\Constant;

/**
 * Api状态码与状态描述常量
 *
 * Class ApiConstant
 * @package App\Constant
 */
class ApiConstant
{
    /**
     * 成功
     */
    const SUCCESS = 1;

    /**
     * 失败
     */
    const FAILED = 0;

    /**
     * 未知错误
     */
    const UNKNOWN = -1;

    /**
     * 成功描述
     */
    const SUCCESS_MSG = "操作成功";

    /**
     * 失败描述
     */
    const FAILED_MSG = "操作失败";

    /**
     * 未知描述
     */
    const UNKNOWN_MSG = "未知错误";
}