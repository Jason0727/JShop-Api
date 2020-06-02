<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxAuthRequest;
use App\Model\HeadLibrary;
use App\Model\OauthUser;
use App\Model\Platform;
use App\Model\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use user\RandomUserInfo;
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
            $authInfo = $wxBizDataCrypt->getData();
            # 平台用户信息
            $oauthUser = OauthUser::query()->where([
                ['open_id', '=', $baseInfo['openid']],
                ['platform_id', '=', $platform->id]
            ])->first();
            if (empty($oauthUser)) {
                # 用户
                $user = User::query()->firstOrCreate(['phone' => $authInfo['purePhoneNumber'], [
                    'nickname' => RandomUserInfo::getNickname(),
                    'avatar_url' => HeadLibrary::getRandomHead(),
                    'phone' => $authInfo['purePhoneNumber']
                ]]);

                $oauthUser = OauthUser::query()->create([

                ]);
            }

            # 用户校验
            $user = User::where('phone', $authInfo['purePhoneNumber'])->first();

        } catch (Exception $exception) {
            dd($exception->getMessage());
            return apiResponse($exception->getCode(), $exception->getMessage());
        }
        die('112321');
        

        # 载荷设置
        $customClaims = [
            'platform_id' => $postData['platform_id']
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($oauthUser);

        # 返回
        return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['token' => $token]);
    }
}
