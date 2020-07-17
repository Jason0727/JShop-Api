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
        # 地区
        $this->call(DistrictsSeeder::class);
        # 头像库
        $this->call(HeadLibrariesSeeder::class);
        # 平台
        $this->call(PlatformsSeeder::class);
        # 用户
        $this->call(UsersSeeder::class);
        # 平台用户
        $this->call(OauthUsersSeeder::class);
        # 小程序标题
        $this->call(PageTitlesSeeder::class);
        # 数据字典
        $this->call(OptionsSeeder::class);
        # Diy模板
        $this->call(DiyTemplatesSeeder::class);
        # 导航轮播/广告位
        $this->call(BannersSeeder::class);
        # 首页导航
        $this->call(HomeNavsSeeder::class);
        # 通知
        $this->call(NoticesSeeder::class);
    }
}
