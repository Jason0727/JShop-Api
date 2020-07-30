<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
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

        Category::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '手机',
            'parent_id' => 0,
            'pic_url' => null,
            'pic_big_url' => null,
            'status' => Category::STATUS_YES,
            'sort' => 0,
            'advert_pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-29/9a12ade240caa2648150f07d35ba4b27.jpg',
            'advert_link_url' => 'page/index/index',
            'platform_id' => 1,
            'level' => 0,
            'parent_path' => '-',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        $this->data[] = [
            'id' => 2,
            'name' => '华为',
            'parent_id' => 1,
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-29/98d0d440eaa89d2a546999e30dde0ff8.jpg',
            'pic_big_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-29/98d0d440eaa89d2a546999e30dde0ff8.jpg',
            'status' => Category::STATUS_YES,
            'sort' => 1,
            'advert_pic_url' => null,
            'advert_link_url' => null,
            'platform_id' => 1,
            'level' => 1,
            'parent_path' => '-1-',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        $this->data[] = [
            'id' => 3,
            'name' => '苹果',
            'parent_id' => 1,
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-29/cc937c43c7c3e853cb6f2ff54f6182ba.jpg',
            'pic_big_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-29/cc937c43c7c3e853cb6f2ff54f6182ba.jpg',
            'status' => Category::STATUS_YES,
            'sort' => 0,
            'advert_pic_url' => null,
            'advert_link_url' => null,
            'platform_id' => 1,
            'level' => 1,
            'parent_path' => '-1-',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
