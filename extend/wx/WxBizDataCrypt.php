<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-02
 * Time: 15:36
 */

namespace wx;


use App\Models\Platform;
use Illuminate\Support\Facades\Log;
use traits\ReturnTrait;
use Exception;

class WxBizDataCrypt
{
    use ReturnTrait;

    /**
     * 解密错误码
     *
     * @var int
     */
    public static $IllegalAesKey = -41001; # 会话密钥长度有误
    public static $IllegalIv = -41002; # 加密算法的初始向量
    public static $IllegalBuffer = -41003;
    public static $DecodeBase64Error = -41004;

    /**
     * 平台
     *
     * @var Platform
     */
    protected $platform;

    /**
     * WxBizDataCrypt constructor.
     * @param Platform $platform 平台
     */
    public function __construct(Platform $platform)
    {
        $this->platform = $platform;
    }

    /**
     * 解密数据
     *
     * @param string $sessionKey 会话密钥
     * @param string $iv 加密算法初始向量
     * @param string $encryptedData 用户加密的数据
     */
    public function decryptData(string $sessionKey, string $iv, string $encryptedData)
    {
        try {
            # 会话密钥长度校验
            if (strlen($sessionKey) != 24) throw new Exception('会话密钥长度有误', self::$IllegalAesKey);
            # 加密算法的初始向量长度校验
            if (strlen($iv) != 24) throw new Exception('加密算法的初始向量长度有误', self::$IllegalIv);
            # 数据解密
            $aesKey = base64_decode($sessionKey);
            $aesIV = base64_decode($iv);
            $aesCipher = base64_decode($encryptedData);
            $result = openssl_decrypt($aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);
            $data = json_decode($result, true);
            if ($data == null) throw new Exception('数据解析失败', self::$IllegalBuffer);
            # 设置返回数据
            $this->setErrCode(0);
            $this->setData($data);
        } catch (Exception $exception) {
            $this->setErrCode($exception->getCode());
            $this->setErrMsg($exception->getMessage());
        }
    }
}