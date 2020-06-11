<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-02
 * Time: 13:19
 */

namespace wx;


use App\Models\Platform;
use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\Log;

class Wx
{
    /**
     * OpenId请求地址
     */
    const OPEN_ID_ULR = "https://api.weixin.qq.com/sns/jscode2session";

    /**
     * 平台
     *
     * @var
     */
    protected $platform;

    /**
     * Wx constructor.
     * @param Platform $platform 平台
     */
    public function __construct(Platform $platform)
    {
        $this->platform = $platform;
    }

    /**
     * 获取用户openId
     *
     * @param string $code 授权code
     * @return bool|mixed
     */
    public function getOpenId(string $code)
    {
        try {
            # 发送请求
            $client = app(Client::class, ['verify' => false]);
            $response = $client->request('GET', self::OPEN_ID_ULR, [
                'query' => [
                    'appid' => $this->platform->app_id,
                    'secret' => $this->platform->app_secret,
                    'js_code' => $code,
                    'grant_type' => 'authorization_code'
                ]
            ]);
            # 响应校验
            if ($response->getStatusCode() != 200) throw new Exception('微信响应异常');
            # 数据解析
            $data = json_decode($response->getBody()->getContents(), true);
            # 参数校验
            if (isset($data['errcode']) && $data['errcode'] != 0) {
                $message = $data['errmsg'] ?? "未知原因";
                throw new Exception($message);
            }

            return $data;
        } catch (Exception $exception) {
            Log::error("获取用户openId失败，原因：" . $exception->getMessage());
            return false;
        }
    }
}