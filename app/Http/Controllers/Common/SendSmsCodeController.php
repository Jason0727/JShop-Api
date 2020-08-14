<?php

namespace App\Http\Controllers\Common;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Common\SendSmsCodeRequest;
use App\Http\Services\SmsService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SendSmsCodeController extends Controller
{
    /**
     * 发送短信验证码
     *
     * @param SendSmsCodeRequest $sendSmsCodeRequest
     * @return mixed
     */
    public function __invoke(SendSmsCodeRequest $sendSmsCodeRequest)
    {
        return DB::transaction(function () use ($sendSmsCodeRequest) {
            # 验证数据
            $postData = $sendSmsCodeRequest->validated();

            # 手机号发送次数和ip校验
            $check = SmsService::checkCountAndIp($postData['phone']);
            if ($check !== true) throw new BadRequestHttpException($check);

            # 发送短信验证码
            $result = SmsService::sendCode($postData['phone']);
            if ($result === false) throw new BadRequestHttpException('验证码发送失败');

            return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG);
        });
    }
}
