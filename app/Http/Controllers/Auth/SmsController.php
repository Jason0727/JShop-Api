<?php


namespace App\Http\Controllers\Auth;


use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SmsAuthRequest;
use App\Http\Requests\Auth\SmsCodeRequest;
use App\Http\Services\SmsService;
use Exception;

class SmsController extends Controller
{
    public function login(SmsAuthRequest $smsAuthRequest)
    {
        try {
            $platform = app('platform');
            # 验证数据
            $postData = $smsAuthRequest->validated();
        } catch (Exception $exception) {
            return apiResponse(ApiConstant::FAILED, ApiConstant::FAILED_MSG);
        }
    }

    /**
     * 发送短信验证码
     *
     * @param SmsCodeRequest $smsCodeRequest
     * @return false|string
     */
    public function sendCode(SmsCodeRequest $smsCodeRequest)
    {
        try {
            # 验证数据
            $postData = $smsCodeRequest->validated();
            # 手机号发送次数和ip校验
            $check = SmsService::checkCountAndIp($postData['phone']);
            if ($check !== true) throw new Exception($check);
            # 发送短信验证码
            $result = SmsService::sendCode($postData['phone']);
            if ($result === false) throw new Exception('验证码发送失败');

            return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG);
        } catch (Exception $exception) {
            return apiResponse(ApiConstant::FAILED, $exception->getMessage());
        }
    }
}
