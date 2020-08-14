<?php

use Illuminate\Database\Seeder;
use App\Models\SmsPhoneBlackList;
use Carbon\Carbon;

class SmsPhoneBlackListSeeder extends Seeder
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

        SmsPhoneBlackList::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'phone' => '13585966246',
            'reason' => "短信轰炸",
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
