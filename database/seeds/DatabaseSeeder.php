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
        $this->call(DistrictSeeder::class);
        # 头像库
        $this->call(HeadLibrarySeeder::class);
        # 平台
        $this->call(PlatformSeeder::class);
        # 用户
        $this->call(UserSeeder::class);
        # 平台用户
        $this->call(OauthUserSeeder::class);
        # 小程序标题
        $this->call(PageTitleSeeder::class);
        # 数据字典
        $this->call(OptionSeeder::class);
        # Diy模板
        $this->call(DiyTemplateSeeder::class);
        # 导航轮播/广告位
        $this->call(BannerSeeder::class);
        # 首页导航
        $this->call(HomeNavSeeder::class);
        # 通知
        $this->call(NoticeSeeder::class);
        # 专题类型
        $this->call(TopicTypeSeeder::class);
        # 专题
        $this->call(TopicSeeder::class);
        # 用户专题收藏
        $this->call(TopicFavoriteSeeder::class);
        # 视频
        $this->call(VideoSeeder::class);
        # 商户所售类目
        $this->call(MerchantCommonCategorieSeeder::class);
        # 商户
        $this->call(MerchantSeeder::class);
        # 图片魔方
        $this->call(HomeBlockSeeder::class);
        # 商品分类
        $this->call(CategorySeeder::class);
        # 裂变红包配置
        $this->call(FindRedPackageConfigSeeder::class);
        # 商品属性名
        $this->call(GoodAttrNameSeeder::class);
        # 商品属性值
        $this->call(GoodAttrValueSeeder::class);
        # 商品SKU
        $this->call(GoodSkuSeeder::class);
        # 商品
        $this->call(GoodSeeder::class);
        # 商品-平台
        $this->call(GoodPlatformSeeder::class);
        # 手机白名单
        $this->call(SmsPhoneWhiteListSeeder::class);
        #  手机黑名单
        $this->call(SmsPhoneBlackListSeeder::class);
    }
}
