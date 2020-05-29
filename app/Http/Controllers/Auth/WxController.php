<?php


namespace App\Http\Controllers\Auth;

use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WxAuthRequest;
use App\Model\District;
use App\Model\OauthUser;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Tymon\JWTAuth\Facades\JWTAuth;

class WxController extends Controller
{
    public function login(WxAuthRequest $wxAuthRequest)
    {
        if (!Cache::has('amapDistrictsData')) {
            $client = new Client();
            $response = $client->request('get', 'https://restapi.amap.com/v3/config/district', [
                'query' => [
                    'key' => env('AMAP_KEY'),
                    'subdistrict' => 3
                ]
            ]);
            $result = $response->getBody()->getContents();
            Cache::set('amapDistrictsData', $result, 1 * 60 * 60);
        }
        $districtData = json_decode(Cache::get('amapDistrictsData'), true);
        if (isset($districtData['status'], $districtData['info'], $districtData['districts']) && $districtData['status'] == 1 && strtoupper($districtData['info']) == 'OK') {
            $data = [];
            # 数据处理
            foreach ($districtData['districts'] as $country) {
                # 国家处理
                if (strtoupper($country['level']) == District::COUNTRY) $data[] = $this->formatData($country, 0);
                # 省处理
                foreach ($country['districts'] as $province) {
                    if (strtoupper($province['level']) == District::PROVINCE) $data[] = $this->formatData($province, $country['adcode']);
                    # 市处理
                    foreach ($province['districts'] as $city) {
                        if (strtoupper($city['level']) == District::CITY) $data[] = $this->formatData($city, $province['adcode']);
                        # 县/区处理
                        foreach ($city['districts'] as $district) {
                            if (strtoupper($district['level']) == District::DISTRICT) $data[] = $this->formatData($district, $city['adcode']);
                        }
                    }
                }
            }
            # 批量插入
            $slice = 80;
            for ($i = 0; $i <= count($data) - 1; $i += $slice) {
                echo "offset:{$i} size:{$slice}\n";
                District::query()->insert(array_slice($data, $i, $slice));
            }
        }


        die();
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

    private function formatData(array $data, string $parentAdcode = '0')
    {
        return [
            'citycode' => $data['citycode'] ?: null,
            'adcode' => $data['adcode'],
            'name' => $data['name'],
            'center' => $data['center'],
            'level' => strtoupper($data['level']),
            'parent_adcode' => $parentAdcode
        ];
    }
}
