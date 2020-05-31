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

if (!function_exists('random_number_generate')) {
    /**
     * 生成随机数算法
     *
     * @param int $length 长度
     * @param string $type 类型
     * @return string
     */
    function random_number_generate(int $length = 8, string $type = 'all')
    {
        # 字符集
        switch ($type) {
            case 'all':
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                break;
            case 'small':
                $chars = 'abcdefghijklmnopqrstuvwxyz';
                break;
            case 'large':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'int':
                $chars = '0123456789';
                break;
            default:
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        }

        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        return $str;
    }
}

if (!function_exists('rand_str')) {
    /**
     * @param int $length 长度
     * @param string $type 类型 small 小写字母, int 纯数字, large 大写字母, all 字母(包括大小写)数字组合 默认选项
     * @return string
     */
    function rand_str(int $length = 8, string $type = 'all')
    {
        if ($type == 'all') {
            $rand1 = random_number_generate($length - 2, 'all');
            $rand2 = random_number_generate(1, 'small');
            $rand3 = random_number_generate(1, 'int');
            return $rand1 . $rand2 . $rand3;
        }

        return random_number_generate($length, $type);
    }
}
