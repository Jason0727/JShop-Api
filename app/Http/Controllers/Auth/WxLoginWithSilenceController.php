<?php

namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Exceptions\UnauthorizedHttpException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxLoginWithSilenceRequest;
use App\Models\OauthUser;
use Illuminate\Support\Facades\DB;
use redis\LoginAccessToken;
use wx\Wx;

class WxLoginWithSilenceController extends Controller
{
    /**
     * 微信静默登录
     *
     * @param WxLoginWithSilenceRequest $wxLoginWithSilenceRequest
     * @return mixed
     */
    public function __invoke(WxLoginWithSilenceRequest $wxLoginWithSilenceRequest)
    {
        return DB::transaction(function () use ($wxLoginWithSilenceRequest) {
            # 请求参数
            $postData = $wxLoginWithSilenceRequest->validationData();
            $platform = app('platform');

            # 通过code换取openid
            $wx = new Wx($platform);
            $baseInfo = $wx->getOpenId($postData['code']);
            if ($baseInfo === false) throw new UnauthorizedHttpException();

            # 平台用户信息
            $oauthUser = OauthUser::query()->where([
                ['open_id', '=', $baseInfo['openid']],
                ['platform_id', '=', $platform->id]
            ])->first();
            if (!$oauthUser) throw new UnauthorizedHttpException("您需要授权手机号哦~");

            # 查询AccessToken缓存
            $loginAccessToken = new LoginAccessToken($oauthUser->id);
            if (!$loginAccessToken->get()) throw new UnauthorizedHttpException("token已过期，请重新授权~");

            # 设置unionId
            !$oauthUser->union_id && isset($baseInfo['unionid']) && $baseInfo['unionid'] && $oauthUser->setUnionId($baseInfo['unionid']);

            # 用户信息
            $user = $oauthUser->user;

            # 解除绑定关系
            $oauthUser->unsetRelation('user');

            # 设置返回信息
            $data = [
                'user' => $user,
                'oauth_user' => $oauthUser,
                'access_token' => $loginAccessToken->get()
            ];

            # 返回
            return api_response(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, $data);
        });
    }
}
