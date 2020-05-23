<?php

/**
 * 函数库
 */

if (!function_exists('apiResponse')) {

    /**
     * Api接口响应
     *
     * @param string $code
     * @param string $msg
     * @param array $data
     * @return false|string
     */
    function apiResponse(string $code, string $msg, array $data = [])
    {
        return json_encode(['code' => $code, 'msg' => $msg, 'data' => $data], JSON_UNESCAPED_UNICODE);
    }
}