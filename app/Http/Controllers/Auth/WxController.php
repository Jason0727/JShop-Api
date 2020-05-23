<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxAuthRequest;
use App\Model\OauthUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use wx\Test;

class WxController extends Controller
{
    public function login(WxAuthRequest $wxAuthRequest)
    {
        Test::t1();
        # 请求参数
        $postData = $wxAuthRequest->validationData();
        # 通过code获取openId
        $openId = 0;
        # OauthUser校验
        $oauthUser = OauthUser::where([
            ['open_id', '=', $openId],
            ['platform_id', '=', $postData['platform_id']],
        ]);
        if (empty($oauthUser)) {

        }

        # 载荷设置
        $customClaims = [
            'platform_id' => $postData['platform_id']
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($oauthUser);

        # 返回
        return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['token' => $token]);
    }
}