<?php


namespace App\Constant;


class RedisConstant
{
    /**
     * Redis操作库
     */
    const DATABASE_0 = 0; # 用户信息、Token信息
    const DATABASE_1 = 1;
    const DATABASE_2 = 2;
    const DATABASE_3 = 3;
    const DATABASE_4 = 4;
    const DATABASE_5 = 5;
    const DATABASE_6 = 6;
    const DATABASE_7 = 7;
    const DATABASE_8 = 8;
    const DATABASE_9 = 9;
    const DATABASE_10 = 10;
    const DATABASE_11 = 11;
    const DATABASE_12 = 12;
    const DATABASE_13 = 13;
    const DATABASE_14 = 14;
    const DATABASE_15 = 15; # 短信

    # 短信验证码
    const SMS_CODE = 'SMS_CODE';

    # 当日相同手机号码最大短信发送次数
    const MAX_SMS_NUM = 'MAX_SMS_NUM';

    # 当日相同IP地址最大短信发送次数
    const MAX_IP_NUM = 'MAX_IP_NUM';

    /**
     * AccessToken缓存前缀
     */
    const ACCESS_TOKEN = 'ACCESS_TOKEN';
}
