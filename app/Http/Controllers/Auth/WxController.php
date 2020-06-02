<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxAuthRequest;
use App\Model\OauthUser;
use App\Model\Platform;
use Tymon\JWTAuth\Facades\JWTAuth;
use wx\Wx;
use Exception;
use wx\WxBizDataCrypt;

class WxController extends Controller
{
    public function login(WxAuthRequest $wxAuthRequest)
    {
        try {
            # 请求参数
            $postData = $wxAuthRequest->validationData();
            $platform = app('platform');
            # 获取用户openId(包含unionId)
            $wx = new Wx($platform);
            $baseInfo = $wx->getOpenId($postData['code']);
            if ($baseInfo === false) throw new Exception('登录失败，请稍后再试', ApiConstant::AUTH_ERROR);
            # 用户信息解析
            $wxBizDataCrypt = new WxBizDataCrypt($platform);
            $wxBizDataCrypt->decryptData($baseInfo['session_key'], $postData['iv'], $postData['encrypted_data']);
            if ($wxBizDataCrypt->getErrCode() != 0) throw new Exception('手机号授权失败', ApiConstant::AUTH_ERROR);
            

        } catch (Exception $exception) {
            dd($exception->getMessage());
            return apiResponse($exception->getCode(), $exception->getMessage());
        }
        die('112321');

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
