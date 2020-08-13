<?php


namespace App\Constant;


class RedisConstant
{
    # 短信验证码
    const SMS_CODE = 'SMS_CODE';

    # 当日相同手机号码最大短信发送次数
    const MAX_SMS_NUM = 'MAX_SMS_NUM';

    # 当日相同IP地址最大短信发送次数
    const MAX_IP_NUM = 'MAX_IP_NUM';

    /**
     * Redis操作库
     */
    const SELECT_0 = 0;
    const SELECT_1 = 1;
    const SELECT_2 = 2;
    const SELECT_3 = 3;
    const SELECT_4 = 4;
    const SELECT_5 = 5;
    const SELECT_6 = 6;
    const SELECT_7 = 7;
    const SELECT_8 = 8;
    const SELECT_9 = 9;
    const SELECT_10 = 10;
    const SELECT_11 = 11;
    const SELECT_12 = 12;
    const SELECT_13 = 13;
    const SELECT_14 = 14;
    const SELECT_15 = 15;

    /**
     * AccessToken缓存前缀
     */
    const ACCESS_TOKEN = 'ACCESS_TOKEN';
}
