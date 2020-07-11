<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # 地区Seeder
        $this->call(DistrictsSeeder::class);
        # 头像库Seeder
        $this->call(HeadLibrariesSeeder::class);
        # 平台Seeder
        $this->call(PlatformsSeeder::class);
        # 用户Seeder
        $this->call(UsersSeeder::class);
        # 平台用户Seeder
        $this->call(OauthUsersSeeder::class);
        # 小程序标题Seeder
        $this->call(PageTitlesSeeder::class);
        # 数据字典Seeder
        $this->call(OptionsSeeder::class);
        # Diy模板Seeder
        $this->call(DiyTemplatesSeeder::class);
        # 导航轮播（广告位）Seeder
        $this->call(BannersSeeder::class);
        # 首页导航
        $this->call(HomeNavsSeeder::class);
    }
}
