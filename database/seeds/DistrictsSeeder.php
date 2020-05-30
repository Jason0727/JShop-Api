<?php

use App\Model\District;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "District Sync Start:" . "\n";
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
            $slice = 1000;
            for ($i = 0; $i <= count($data) - 1; $i += $slice) {
                echo "offset:{$i} size:{$slice}\n";
                District::query()->insert(array_slice($data, $i, $slice));
            }
            echo "District Success！" . "\n";
        }
    }

    /**
     * 格式化数据结构
     *
     * @param array $data 待格式化数据
     * @param string $parentAdcode 父级adcode
     * @return array
     */
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
