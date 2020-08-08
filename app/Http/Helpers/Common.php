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
    function apiResponse(string $code, string $msg = "操作成功", array $data = [])
    {
        return response()->json(['code' => $code, 'msg' => $msg, 'data' => $data]);
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

if (!function_exists('get_header_info')) {
    /**
     * 获取header信息（兼容Apache和Nginx）
     *
     * @param string $option
     * @return array|mixed|string
     */
    function get_header_info(string $option = "")
    {
        if (function_exists('apache_request_headers')) { # 存在 则为Apache服务器
            $headers = apache_request_headers();
        } else { # Nginx服务器
            $headers = [];
            foreach ($_SERVER as $name => $value) {
                if (substr($name, 0, 5) == 'HTTP_') {
                    $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                }
            }
        }

        if ($option) {
            return isset($headers[$option]) ? $headers[$option] : "";
        }

        return $headers;
    }
}

if (!function_exists('get_platform_id')) {
    /**
     * 获取平台ID
     *
     * @return array|mixed|string
     */
    function get_platform_id()
    {
        return get_header_info('Platform');
    }
}

if (!function_exists('get_real_ip')) {
    /**
     * 获取真实IP
     *
     * @return mixed|string
     */
    function get_real_ip()
    {
        # 初始ip
        $realIp = "127.0.0.1";
        # 真实ip
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            # 排除内网ip
            foreach ($ips as $ip) {
                # 去除空格
                $ip = trim($ip);
                # 排除 A类地址: 10.0.0.0 -- 10.255.255.255 和 C类地址: 192.168.0.0 -- 192.168.255.255 地址
                if (preg_match('/^10\./', $ip) || preg_match('/^192\.168/', $ip)) continue;
                # 排除 B类地址 172.16.0.0 -- 172.31.255.255
                $ipFields = explode('.', $ip);
                if ($ipFields[0] == 172 && $ipFields[1] >= 16 && $ipFields[1] <= 31) continue;
                # 设置真实ip
                $realIp = $ip;
                break;
            }
        } else {
            $realIp = isset($_SERVER['HTTP_X_REAL_IP']) && !empty($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : (isset($_SERVER["REMOTE_ADDR"]) && !empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "127.0.0.1");
        }

        return $realIp;
    }
}