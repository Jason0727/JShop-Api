<?php


namespace App\Http\Services;

use App\Constant\RedisConstant;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsService
{
    /**
     * 手机号码白名单
     */
    const WHITE_PHONE = [
        '13601587485'
    ];

    /**
     * 发送短信验证码
     *
     * @param string $phone 手机号
     * @return bool
     */
    public static function sendCode(string $phone)
    {
        try {
            DB::beginTransaction();
            # 生成随机数
            $code = rand_str(6, 'int');
            # 发送短信
            $sms = app(EasySms::class);
            $params = [
                'content' => '您的验证码:' . $code . ',如非本人操作，请忽略本短信',
                'template' => 'SMS_191801361',
                'data' => [
                    'code' => $code
                ]
            ];
            $response = $sms->send($phone, $params);
            $gateway = strtolower(env('SMS_GATEWAY'));
            if (empty($gateway) || !isset($response[$gateway]['result']['Code'])) throw new Exception('返回数据异常');
            if (strtoupper($response[$gateway]['result']['Code']) != 'OK') throw new Exception('短信反馈发送失败');
            # 记录redis
            Redis::select(RedisConstant::SELECT_15);
            Redis::set(RedisConstant::SMS_CODE . ":" . $phone, $code);
            Redis::expire(RedisConstant::SMS_CODE . ":" . $phone, env('SMS_CODE_EXPIRE'));
            # 发送次数自增1
            $expire = Carbon::now()->endOfDay()->timestamp - Carbon::now()->timestamp;
            Redis::incr(RedisConstant::MAX_SMS_NUM . ":" . $phone);
            Redis::expire(RedisConstant::MAX_SMS_NUM . ":" . $phone, $expire);
            # ip次数自增1
            $ip = get_real_ip();
            Redis::incr(RedisConstant::MAX_IP_NUM . ":" . $ip);
            Redis::expire(RedisConstant::MAX_IP_NUM . ":" . $ip, $expire);
            # 记录发送记录
            DB::commit();
            return true;
        } catch (NoGatewayAvailableException $exception) {
            Log::error("短信发送失败:" . $exception->getException('aliyun')->getMessage());
            DB::rollBack();
            return false;
        } catch (Exception $exception) {
            Log::error("短信发送失败:" . $exception->getMessage());
            DB::rollBack();
            return false;
        }
    }

    /**
     * 短信验证码校验
     *
     * @param string $phone 手机号
     * @param string $code 验证码
     * @return bool
     */
    public static function checkCode(string $phone, string $code)
    {
        try {
            Redis::select(RedisConstant::SELECT_15);
            $getCode = Redis::get(RedisConstant::SMS_CODE . ":" . $phone);
            if (empty($getCode)) throw new Exception('验证码无效');
            if ($code != $getCode) throw new Exception('验证码不正确');

            return true;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * 校验当日短信发送次数及相同ip发送次数
     *
     * @param string $phone
     * @return bool
     */
    public static function checkCountAndIp(string $phone)
    {
        try {
            # 手机号码白名单校验
            if (in_array($phone, self::WHITE_PHONE)) return true;
            # 手机发送次数校验
            Redis::select(RedisConstant::SELECT_15);
            $sendNum = Redis::get(RedisConstant::MAX_SMS_NUM . ":" . $phone);
            $sendNum = $sendNum ?: 0;
            if ($sendNum >= env('MAX_SMS_NUM')) throw new Exception('获取验证码已达当天上限');
            # IP次数校验
            $ip = get_real_ip();
            $ipNum = Redis::get(RedisConstant::MAX_IP_NUM . ":" . $ip);
            $ipNum = $ipNum ?: 0;
            if ($ipNum >= env('MAX_IP_NUM')) throw new Exception('您访问太频繁，请稍后再试');

            return true;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
