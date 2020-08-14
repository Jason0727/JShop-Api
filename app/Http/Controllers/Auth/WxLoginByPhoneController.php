<?php

namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Constant\RedisConstant;
use App\Exceptions\UnauthorizedHttpException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxLoginByPhoneRequest;
use App\Models\HeadLibrary;
use App\Models\OauthUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use redis\LoginAccessToken;
use Tymon\JWTAuth\Facades\JWTAuth;
use user\RandomUserInfo;
use wx\Wx;
use wx\WxBizDataCrypt;

class WxLoginByPhoneController extends Controller
{
    public function __invoke(WxLoginByPhoneRequest $wxLoginByPhoneRequest)
    {
        return DB::transaction(function () use ($wxLoginByPhoneRequest) {
            # 请求参数
            $postData = $wxLoginByPhoneRequest->validationData();
            $platform = app('platform');

            # 通过code换取openid
//            $wx = new Wx($platform);
//            $baseInfo = $wx->getOpenId($postData['code']);
//            if ($baseInfo === false) throw new UnauthorizedHttpException();

            $baseInfo['openid'] = "oreZ65eXUu6ENFm-IQQtvUvaPIgI";

            # 平台用户信息
            $oauthUser = OauthUser::query()->where([
                ['open_id', '=', $baseInfo['openid']],
                ['platform_id', '=', $platform->id]
            ])->first();
            if (!$oauthUser) {
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
            $accessToken = JWTAuth::claims($customClaims)->fromUser($oauthUser);

            # 设置AccessToken缓存
            $loginAccessToken = new LoginAccessToken($oauthUser->id);
            $loginAccessToken->set($accessToken);

            # 用户信息
            $user = $oauthUser->user;

            # 解除绑定关系
            $oauthUser->unsetRelation('user');

            # 设置返回信息
            $data = [
                'user' => $user,
                'oauth_user' => $oauthUser,
                'access_token' => $accessToken
            ];

            # 返回
            return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $data);
        });
    }
}
