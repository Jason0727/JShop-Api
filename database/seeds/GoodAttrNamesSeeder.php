<?php

use Illuminate\Database\Seeder;
use App\Models\GoodAttrName;
use Carbon\Carbon;

class GoodAttrNamesSeeder extends Seeder
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

        GoodAttrName::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'good_id' => 1,
            'name' => '颜色',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 2,
            'good_id' => 1,
            'name' => '尺码',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
