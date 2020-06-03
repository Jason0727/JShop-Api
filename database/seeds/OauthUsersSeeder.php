<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Model\OauthUser;

class OauthUsersSeeder extends Seeder
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

        OauthUser::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        # 自己
        $this->data[] = [
            'id' => 1,
            'user_id' => 1,
            'open_id' => 'oreZ65eXUu6ENFm-IQQtvUvaPIgI',
            'platform_id' => 1,
            'union_id' => 'oynfm1RDKr9xf6hh0nEfL01iI-ms',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
