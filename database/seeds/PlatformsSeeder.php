<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformsSeeder extends Seeder
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

        Platform::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        # 微信小程序
        $this->data[] = [
            'id' => 1,
            'name' => '微信小程序',
            'icon' => 'https://fmy90.oss-cn-beijing.aliyuncs.com/fmy/public/6b4f092f0f2785a8e9346b38ca62e4ad.jpg',
            'app_id' => 'wx501990400906c9ff',
            'app_secret' => 'fb66d48717531404e1bcc9a67a89ddfa',
            'oauth' => 'weixinsmall',
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        # 支付宝小程序
    }
}
