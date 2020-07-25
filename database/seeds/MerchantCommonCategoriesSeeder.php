<?php

use Illuminate\Database\Seeder;
use App\Models\MerchantCommonCategory;
use Carbon\Carbon;

class MerchantCommonCategoriesSeeder extends Seeder
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

        MerchantCommonCategory::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '宠物',
            'status' => MerchantCommonCategory::STATUS_YES,
            'sort' => 0,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        $this->data[] = [
            'id' => 2,
            'name' => '水产',
            'status' => MerchantCommonCategory::STATUS_YES,
            'sort' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        $this->data[] = [
            'id' => 3,
            'name' => '食品',
            'status' => MerchantCommonCategory::STATUS_YES,
            'sort' => 2,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
