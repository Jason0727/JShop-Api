<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\FissionRedPackageConfig;

class FissionRedPackageConfigsSeeder extends Seeder
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

        FissionRedPackageConfig::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'user_num' => 2,
            'total_money' => 10,
            'use_minimum' => 1,
            'expire_days' => 30,
            'distribute_type' => 0,
            'single_expire_hours' => 2,
            'status' => 1,
            'rule' => '1.用户可邀请好友共同拆红包，满N人则拆红包现金红包成功，共同瓜分总金额为N元的红包，每人获得红包金额随机（或平均）; 其中随机一人将获得“手气最佳红包”。
                        2.每个红包发起后24小时未组满N人即失败，无红包奖励。
                        3.活动期间，不能帮同一好友拆多次，但发起拆红包次数不限。
                        4.发起拆红包的用户需在该红包满N人拆成功或逾期失败后，才可再发起拆下一个红包。
                        5.一起拆红包活动的红包均为满减现金券。
                        6.本公司对该活动规则保留最终解释权。',
            'share_title' => '一起拆红包',
            'share_pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-06/f106a14d1bb6048a006fe09ff1a1dac8.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
