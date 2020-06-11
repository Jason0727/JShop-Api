<?php

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
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

//        Store::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        # 自己
        $this->data[] = [
            'id' => 1
        ];
    }
}
