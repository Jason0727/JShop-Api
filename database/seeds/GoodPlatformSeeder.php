<?php

use Illuminate\Database\Seeder;
use App\Models\GoodPlatform;

class GoodPlatformSeeder extends Seeder
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

        GoodPlatform::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'good_id' => 1,
            'platform_id' => 1
        ];
    }
}
