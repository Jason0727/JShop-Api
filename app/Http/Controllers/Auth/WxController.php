<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Exceptions\UnauthorizedHttpException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxAuthRequest;
use App\Models\HeadLibrary;
use App\Models\OauthUser;
use App\Models\Platform;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use user\RandomUserInfo;
use wx\Wx;
use wx\WxBizDataCrypt;

class WxController extends Controller
{
    /**
     * 微信登录
     *
     * @param WxAuthRequest $wxAuthRequest
     * @return false|string
     * @throws UnauthorizedHttpException
     */
    public function login(WxAuthRequest $wxAuthRequest)
    {
        # 请求参数
        $postData = $wxAuthRequest->validationData();
        $platform = app('platform');
        # todo:用户信息暂时写死，同时验证规则字段也取消了，后期需要打开
        # 获取用户openId(包含unionId)
//            $wx = new Wx($platform);
//            $baseInfo = $wx->getOpenId($postData['code']);
//            if ($baseInfo === false) throw new Exception('登录失败，请稍后再试', ApiConstant::AUTH_ERROR);
        $baseInfo['openid'] = 'oreZ65eXUu6ENFm-IQQtvUvaPIgI';
        # 平台用户信息
        $oauthUser = OauthUser::query()->where([
            ['open_id', '=', $baseInfo['openid']],
            ['platform_id', '=', $platform->id]
        ])->first();
        if (empty($oauthUser)) {
            # 用户信息解析
            $wxBizDataCrypt = new WxBizDataCrypt($platform);
            $wxBizDataCrypt->decryptData($baseInfo['session_key'], $postData['iv'], $postData['encrypted_data']);
            if ($wxBizDataCrypt->getErrCode() != 0) throw new UnauthorizedHttpException();
            $authInfo = $wxBizDataCrypt->getData();
            # 查询或新增用户
            $user = User::query()->firstOrCreate(
                ['phone' => $authInfo['purePhoneNumber']],
                [
                    'nickname' => RandomUserInfo::getNickname(),
                    'avatar_url' => HeadLibrary::getRandomHead(),
                ]
            );
            # 新增平台用户
            $oauthUser = OauthUser::query()->create([
                'user_id' => $user->id,
                'open_id' => $baseInfo['openid'],
                'platform_id' => $platform->id,
                'union_id' => $baseInfo['unionid'] ?: ""
            ]);
        }
        # 载荷设置
        $customClaims = [];
        $token = JWTAuth::claims($customClaims)->fromUser($oauthUser);
        # 返回数据
        $data = [
            'access_token' => $token,
            'expire_in' => env('JWT_TTL')
        ];

        # 返回
        return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $data);
    }
}
