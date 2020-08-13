<?php

use Illuminate\Database\Seeder;
use App\Models\HeadLibrary;
use Carbon\Carbon;

class HeadLibrarySeeder extends Seeder
{
    /**
     * 吉祥物类型头像Url
     */
    const MASCOt = [
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/36.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/37.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/38.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/39.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/40.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/41.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/42.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/43.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/44.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/45.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/46.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/47.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/48.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/49.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/50.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/51.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/52.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/53.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/54.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/55.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/56.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/57.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/58.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/59.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/60.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/61.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/62.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/63.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/64.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Mascot/65.png'
    ];

    /**
     * 动物类型头像Url
     */
    const ANIMAL = [
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/1.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/2.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/3.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/4.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/5.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/6.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/7.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/8.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/9.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/10.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/11.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/12.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/13.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/14.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/15.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/16.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/17.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/18.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/19.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/20.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/21.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/22.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/23.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/24.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/25.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/26.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/27.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/28.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/29.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/30.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/31.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/32.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/33.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/34.png',
        'https://fmy90.oss-cn-beijing.aliyuncs.com/Feimayi90/UserHeader/Animal/35.png'
    ];

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

        HeadLibrary::query()->insert($this->data);
    }

    /**
     * 格式化待插入数据
     */
    private function formatData()
    {
        # 吉祥物类
        foreach (self::MASCOt as $mascot) {
            $this->data[] = [
                'head_url' => $mascot,
                'status' => HeadLibrary::STATUS_YES,
                'type' => HeadLibrary::TYPE_MASCOT,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ];
        }
        # 动物类
        foreach (self::ANIMAL as $animal) {
            $this->data[] = [
                'head_url' => $animal,
                'status' => HeadLibrary::STATUS_YES,
                'type' => HeadLibrary::TYPE_ANIMAL,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ];
        }
    }
}
