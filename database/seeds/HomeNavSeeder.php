<?php

use Illuminate\Database\Seeder;
use App\Models\HomeNav;

class HomeNavSeeder extends Seeder
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

        HomeNav::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '签到',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-11/94bf48b57e86bd89dacfbdb7eef93d8d.png',
            'platform_id' => 1,
            'sort' => 0,
            'status' => 1,
            'open_type' => 1,
            'link_url' => '/pages/cat/cat?cat_id=2',
            'appid' => null
        ];
        $this->data[] = [
            'id' => 2,
            'name' => '积分商城',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-11/83aab2a9702f59af89bfaaee457901bc.png',
            'platform_id' => 1,
            'sort' => 1,
            'status' => 1,
            'open_type' => 1,
            'link_url' => '/pages/integral-mall/register/index',
            'appid' => null
        ];
        $this->data[] = [
            'id' => 3,
            'name' => '领红包',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-11/2c46f52f28fb02450bf1fba1079d9e6b.png',
            'platform_id' => 1,
            'sort' => 0,
            'status' => 1,
            'open_type' => 1,
            'link_url' => '/pages/fxhb/open/open',
            'appid' => null
        ];
        $this->data[] = [
            'id' => 4,
            'name' => '砍价',
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-11/9b619bc5b0c6404282b770fc0daec22d.png',
            'platform_id' => 1,
            'sort' => 0,
            'status' => 1,
            'open_type' => 1,
            'link_url' => '/bargain/list/list',
            'appid' => null
        ];
    }
}
