<?php

use Illuminate\Database\Seeder;
use App\Models\GoodSku;
use Carbon\Carbon;

class GoodSkuSeeder extends Seeder
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

        GoodSku::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => "测试商品（红色-64G）",
            'good_id' => 1,
            'stock' => 1,
            'sales' => 10,
            'price' => 1.5,
            'cost_price' => 1,
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/37748d504c252963e1df4faf1d2bc5ca.jpg',
            'attr' => json_encode([
                ['attr_value_id' => 1, 'attr_name' => '红色'],
                ['attr_value_id' => 3, 'attr_name' => '64G'],
            ]),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 2,
            'name' => "测试商品（红色-128G）",
            'good_id' => 1,
            'stock' => 2,
            'sales' => 20,
            'price' => 2.5,
            'cost_price' => 2,
            'pic_url' => 'https: //dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/08c721087013e563119ffc7f6133f1b6.gif',
            'attr' => json_encode([
                ['attr_value_id' => 1, 'attr_name' => '红色'],
                ['attr_value_id' => 4, 'attr_name' => '128G'],
            ]),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 3,
            'name' => "测试商品（红色-256G）",
            'good_id' => 1,
            'stock' => 3,
            'sales' => 30,
            'price' => 3.5,
            'cost_price' => 3,
            'pic_url' => 'https: //dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/621dbf925acc873481747badd01a46e3.jpg',
            'attr' => json_encode([
                ['attr_value_id' => 1, 'attr_name' => '红色'],
                ['attr_value_id' => 5, 'attr_name' => '256G'],
            ]),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 4,
            'name' => "测试商品（蓝色-64G）",
            'good_id' => 1,
            'stock' => 4,
            'sales' => 40,
            'price' => 4.5,
            'cost_price' => 4,
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/468285d37719e97cfb1ea26adcc4a489.jpg',
            'attr' => json_encode([
                ['attr_value_id' => 2, 'attr_name' => '蓝色'],
                ['attr_value_id' => 3, 'attr_name' => '64G'],
            ]),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 5,
            'name' => "测试商品（蓝色-128G）",
            'good_id' => 1,
            'stock' => 5,
            'sales' => 50,
            'price' => 5.5,
            'cost_price' => 5,
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/a4a4efdaeeb2945b6749708d0666dd0d.jpg',
            'attr' => json_encode([
                ['attr_value_id' => 2, 'attr_name' => '蓝色'],
                ['attr_value_id' => 4, 'attr_name' => '128G'],
            ]),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 6,
            'name' => "测试商品（蓝色-256G）",
            'good_id' => 1,
            'stock' => 6,
            'sales' => 60,
            'price' => 6.5,
            'cost_price' => 6,
            'pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/a3e1e3d26740784933d4c52d423a3bd4.jpg',
            'attr' => json_encode([
                ['attr_value_id' => 2, 'attr_name' => '蓝色'],
                ['attr_value_id' => 5, 'attr_name' => '256G'],
            ]),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
