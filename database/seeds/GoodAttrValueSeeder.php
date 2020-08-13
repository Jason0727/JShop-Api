<?php

use Illuminate\Database\Seeder;
use App\Models\GoodAttrValue;
use Carbon\Carbon;

class GoodAttrValueSeeder extends Seeder
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

        GoodAttrValue::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'attr_name_id' => 1,
            'value' => '红色',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 2,
            'attr_name_id' => 1,
            'value' => '蓝色',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 3,
            'attr_name_id' => 2,
            'value' => '64G',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 4,
            'attr_name_id' => 2,
            'value' => '128G',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 5,
            'attr_name_id' => 2,
            'value' => '256G',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
