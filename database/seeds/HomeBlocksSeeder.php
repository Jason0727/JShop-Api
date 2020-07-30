<?php

use Illuminate\Database\Seeder;
use App\Models\HomeBlock;
use Carbon\Carbon;

class HomeBlocksSeeder extends Seeder
{
    /**
     * 待批量插入数据
     *
     * @var array
     */
    private $data = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->formatData();

        HomeBlock::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '首页三图',
            'platform_id' => 1,
            'status' => HomeBlock::STATUS_YES,
            'data' => json_encode([
                [
                    'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-26/096cecdd75a1d6645674f75da7543da2.gif',
                    'open_type' => 0,
                    'link_url' => '',
                    'appid' => ''
                ],
                [
                    'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-26/a20e57790d3f97e54de4c0a4f30df4dd.png',
                    'open_type' => 0,
                    'link_url' => '',
                    'appid' => ''
                ],
                [
                    'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-26/9d65a945a3b651b0c5370e7eb028283d.png',
                    'open_type' => 0,
                    'link_url' => '',
                    'appid' => ''
                ]
            ], JSON_UNESCAPED_UNICODE),
            'style' => HomeBlock::STYLE_DEFAULT,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
