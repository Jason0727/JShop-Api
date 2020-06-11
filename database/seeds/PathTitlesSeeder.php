<?php

use Illuminate\Database\Seeder;
use App\Model\PathTitle;

class PathTitlesSeeder extends Seeder
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

        PathTitle::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = ['page_url' => 'pages/share/index', 'title' => '分销中心'];
        $this->data[] = ['page_url' => 'pages/user/user', 'title' => '个人中心'];
        $this->data[] = ['page_url' => 'pages/pt/index/index', 'title' => '拼团'];
        $this->data[] = ['page_url' => 'pages/book/index/index', 'title' => '预约'];
        $this->data[] = ['page_url' => 'pages/fxhb/open/open', 'title' => '拆红包'];
        $this->data[] = ['page_url' => 'mch/shop-list/shop-list', 'title' => '好店推荐'];
        $this->data[] = ['page_url' => 'pages/cart/cart', 'title' => '购物车'];
        $this->data[] = ['page_url' => 'pages/cat/cat', 'title' => '分类'];
        $this->data[] = ['page_url' => 'pages/coupon/coupon', 'title' => '我的优惠券'];
        $this->data[] = ['page_url' => 'pages/coupon-list/coupon-list', 'title' => '领券中心'];
        $this->data[] = ['page_url' => 'pages/favorite/favorite', 'title' => '我的收藏'];
        $this->data[] = ['page_url' => 'mch/m/myshop/myshop', 'title' => '我的店铺'];
        $this->data[] = ['page_url' => 'mch/shop/shop', 'title' => '店铺首页'];
        $this->data[] = ['page_url' => 'pages/integral-mall/index/index', 'title' => '积分商城'];
        $this->data[] = ['page_url' => 'pages/topic-list/topic-list', 'title' => '专题'];
        $this->data[] = ['page_url' => 'pages/topic/topic', 'title' => '专题详情'];
    }
}
