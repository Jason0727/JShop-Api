<?php


namespace App\Http\Services;

use App\Constant\RedisConstant;
use App\Models\SmsPhoneBlackList;
use App\Models\SmsPhoneWhiteList;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;
use redis\Sms;

class SmsService
{
    /**
     * 发送短信验证码
     *
     * @param string $phone
     * @return bool
     */
    public static function sendCode(string $phone)
    {
        try {
            # 开启事务
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

            # 存储验证码
            $sms = new Sms();
            $sms->storeCode($phone, $code);

            # 发送次数自增1
            $sms->incrSendNum($phone);

            # ip次数自增1
            $sms->incrIpNum();

            # 提交事务
            DB::commit();

            return true;
        } catch (NoGatewayAvailableException $noGatewayAvailableException) {
            Log::error("短信发送失败:" . $noGatewayAvailableException->getException('aliyun')->getMessage());
            # 回滚
            DB::rollBack();

            return false;
        } catch (Exception $exception) {
            Log::error("短信发送失败:" . $exception->getMessage());
            # 回滚
            DB::rollBack();

            return false;
        }
    }

    /**
     * 短信验证码校验
     *
     * @param string $phone 手机号
     * @param int $code 验证码
     * @return bool
     */
    public static function checkCode(string $phone, int $code)
    {
        try {
            $sms = new Sms();
            $result = $sms->checkCode($phone, $code);
            if ($result === false) throw new Exception('验证码不正确');

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
            # 手机号码黑名单校验
            $checkBlack = SmsPhoneBlackList::query()->wherePhone($phone)->first();
            if ($checkBlack) throw new Exception('您已被禁止发送短信，请联系客服~');

            # 手机号码白名单校验
            $checkWhite = SmsPhoneWhiteList::query()->wherePhone($phone)->first();
            if ($checkWhite) return true;

            # 手机发送次数校验
            $sms = new Sms();
            if ($sms->checkMaxSmsNum($phone) === true) throw new Exception('获取验证码已达当天上限');

            # IP次数校验
            if ($sms->checkMaxIpNum() === true) throw new Exception('您访问太频繁，请稍后再试');

            return true;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
