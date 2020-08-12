<?php

use Illuminate\Database\Seeder;
use App\Models\Good;
use Carbon\Carbon;

class GoodsSeeder extends Seeder
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

        Good::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
//            'id' => 1,
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
