<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Model\OauthUser;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class WxController extends Controller
{
    public function login(Request $request)
    {
        $user = OauthUser::first();

        # 载荷设置
        $customClaims = [
            'platform' => $request->platform
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($user);

        # 返回
        return $this->ApiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['token' => $token]);
    }
}