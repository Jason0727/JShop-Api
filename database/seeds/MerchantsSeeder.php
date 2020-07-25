<?php

use Illuminate\Database\Seeder;
use App\Models\Merchant;
use Carbon\Carbon;

class MerchantsSeeder extends Seeder
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

        Merchant::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '疾风Tortoise',
            'logo_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-24/de7ba59c1eb2d5d52c377b4cdea9a07d.jpg',
            'head_bg_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-24/adda77d70ce4b7ad2c8fe146760a7ad1.jpg',
            'user_id' => 1,
            'real_name' => '胖三',
            'tel' => '13988888888',
            'service_tel' => '0523-83623173',
            'is_open' => Merchant::IS_OPEN_YES,
            'is_lock' => Merchant::IS_LOCK_NO,
            'review_status' => Merchant::REVIEW_SUCCESS,
            'review_result' => '恭喜您，店铺审核通过！',
            'review_time' => Carbon::now()->toDateTimeString(),
            'province_code' => 320000,
            'city_code' => 321200,
            'district_code' => 321281,
            'address' => '唐刘镇XXX号',
            'mch_common_cat_id' => 1,
            'main_content' => '乌龟养殖、乌龟代收代售、乌龟繁衍、乌龟培育',
            'summary' => '值的信奈的百年老店~',
            'transfer_rate' => 10,
            'account_money' => 1500.5,
            'sort' => 0,
            'is_recommend' => Merchant::IS_RECOMMEND_YES,
            'longitude' => '120.110924',
            'latitude' => '32.809441',
            'we_chat' => 'smile刺客',
            'qq' => '904894399',
            'email' => '904894399@qq.com',
            'platform_id' => 1,
            'created_at' => Carbon::now()->subDays(2)->toDateTimeString(),
            'updated_at' => Carbon::now()->subDays(2)->toDateTimeString(),
        ];
    }
}
