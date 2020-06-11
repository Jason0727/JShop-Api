<?php

use App\Models\HeadLibrary;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use user\RandomUserInfo;
use App\Models\User;

class UsersSeeder extends Seeder
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

        User::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        # 自己
        $this->data[] = [
            'id' => 1,
            'nickname' => RandomUserInfo::getNickname(),
            'avatar_url' => HeadLibrary::getRandomHead(),
            'phone' => '13601587485',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
