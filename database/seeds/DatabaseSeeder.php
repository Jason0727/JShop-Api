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
        # 专题类型
        $this->call(TopicTypesSeeder::class);
        # 专题
        $this->call(TopicsSeeder::class);
        # 用户专题收藏
        $this->call(TopicFavoritesSeeder::class);
        # 视频
        $this->call(VideosSeeder::class);
        # 商户所售类目
        $this->call(MerchantCommonCategoriesSeeder::class);
        # 商户
        $this->call(MerchantsSeeder::class);
        # 图片魔方
        $this->call(HomeBlocksSeeder::class);
        # 商品分类
        $this->call(CategoriesSeeder::class);
    }
}
