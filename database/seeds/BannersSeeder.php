<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;
use Carbon\Carbon;

class BannersSeeder extends Seeder
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

        Banner::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'title' => '标题1',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-09/dd66c7331b551a98c0d29b5b9561b05c.jpg',
            'platform_id' => 1,
            'sort' => 0,
            'type' => 0,
            'scene' => 'HOME_INDEX',
            'open_type' => 0,
            'link_url' => null,
            'appid' => null,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 2,
            'title' => '标题2',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-09/1b75f5aaab97fe2748d24784ab91da26.jpg',
            'platform_id' => 1,
            'sort' => 1,
            'type' => 0,
            'scene' => 'HOME_INDEX',
            'open_type' => 1,
            'link_url' => '/pages/cat/cat',
            'appid' => null,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 3,
            'title' => '标题3',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-09/2c79375e6873a59eedd263fd82fb2ef3.jpg',
            'platform_id' => 1,
            'sort' => 2,
            'type' => 0,
            'scene' => 'HOME_INDEX',
            'open_type' => 2,
            'link_url' => '/pages/index/index',
            'appid' => '1234567890',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
