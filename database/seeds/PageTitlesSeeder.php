<?php

use Illuminate\Database\Seeder;
use App\Models\PageTitle;

class PageTitlesSeeder extends Seeder
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

        PageTitle::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = ['url' => 'pages/share/index', 'title' => '分销中心'];
        $this->data[] = ['url' => 'pages/user/user', 'title' => '个人中心'];
        $this->data[] = ['url' => 'pages/pt/index/index', 'title' => '拼团'];
        $this->data[] = ['url' => 'pages/book/index/index', 'title' => '预约'];
        $this->data[] = ['url' => 'pages/fxhb/open/open', 'title' => '拆红包'];
        $this->data[] = ['url' => 'mch/shop-list/shop-list', 'title' => '好店推荐'];
        $this->data[] = ['url' => 'pages/cart/cart', 'title' => '购物车'];
        $this->data[] = ['url' => 'pages/cat/cat', 'title' => '分类'];
        $this->data[] = ['url' => 'pages/coupon/coupon', 'title' => '我的优惠券'];
        $this->data[] = ['url' => 'pages/coupon-list/coupon-list', 'title' => '领券中心'];
        $this->data[] = ['url' => 'pages/favorite/favorite', 'title' => '我的收藏'];
        $this->data[] = ['url' => 'mch/m/myshop/myshop', 'title' => '我的店铺'];
        $this->data[] = ['url' => 'mch/shop/shop', 'title' => '店铺首页'];
        $this->data[] = ['url' => 'pages/integral-mall/index/index', 'title' => '积分商城'];
        $this->data[] = ['url' => 'pages/topic-list/topic-list', 'title' => '专题'];
        $this->data[] = ['url' => 'pages/topic/topic', 'title' => '专题详情'];
    }
}
