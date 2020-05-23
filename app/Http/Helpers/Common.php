<?php

/**
 * 函数库
 */

if (!function_exists('apiResponse')) {
    /**
     * @param string $code
     * @param string $msg
     * @param array $data
     * @return array
     */
    function apiResponse(string $code, string $msg, array $data = [])
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }
}