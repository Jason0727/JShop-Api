<?php

use Illuminate\Database\Seeder;
use App\Models\Video;
use Carbon\Carbon;

class VideosSeeder extends Seeder
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

        Video::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'title' => '首页推荐视频',
            'video_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/videos/2020-07-19/130efded630be21a2eabef215a4304cf.mp4',
            'status' => Video::STATUS_YES,
            'sort' => 0,
            'cover_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/d0ca86356ac796c30a2187c0a4a97a39.jpg',
            'content' => '首页推荐视频详情',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
