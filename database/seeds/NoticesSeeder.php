<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Notice;

class NoticesSeeder extends Seeder
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

        Notice::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '公告',
            'platform_id' => 1,
            'type' => Notice::TYPE_HOME,
            'status' => Notice::STATUS_YES,
            'icon_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-18/a0866bc4d8cb0034053e1429a92a1ba5.png',
            'bg_color' => '#f67f79',
            'color' => '#ffffff',
            'content' => '感冒低发期，天气舒适，请注意多吃蔬菜水果，多喝水哦',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
