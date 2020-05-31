<?php


namespace App\Http\Services;

use App\Constant\RedisConstant;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsService
{
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
            Redis::select(RedisConstant::SELECT15);
            Redis::set(RedisConstant::SMS_CODE . ":" . $phone, $code, env('SMS_CODE_EXPIRE'));
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
}
