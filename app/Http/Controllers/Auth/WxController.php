<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxAuthRequest;
use App\Model\OauthUser;
use Tymon\JWTAuth\Facades\JWTAuth;

class WxController extends Controller
{
    public function login(WxAuthRequest $wxAuthRequest)
    {
        $validated = $wxAuthRequest->validated();

        $user = OauthUser::first();

        # 载荷设置
        $customClaims = [
            'platform_id' => $validated['platform_id']
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($user);

        # 返回
        return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['token' => $token]);
    }
}