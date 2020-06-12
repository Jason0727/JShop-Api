<?php

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
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

        Store::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => '胖海豚',
            'logo' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-12/7d341d39b33e31c8e1a7b9c98d4feef1.jpg',
            'contact_tel' => '13601587485',
            'show_customer_service' => 1,
            'delivery_time' => 10,
            'after_sale_time' => 15,
            'cat_style' => 4,
            'cat_goods_cols' => 2,
            'cat_goods_count' => 2,
            'address' => '上海上海市浦东新区博兴路1768弄',
            'over_half_hour' => 1,
            'is_offline' => 1,
            'is_coupon' => 1,
            'send_type' => 0,
            'nav_count' => 0,
            'integral' => 10,
            'integration' => "1. 积分获取
                            a)  积分专属邮乐,仅限邮乐网内使用;
                            b)  积分可以累积,2年内有效;
                            c)  买家在邮乐网消费购物可以获得积分,积分返点比例为:除3C产品外的所有商品均以2元:1积分计,3C产品以10元:1积分计,购买的商品页面中显示积分为零的商品不享受积分获取;
                            d)  积分的数值精确到个位(小数点后全部舍弃,不进行四舍五入),例如:**101元的商品,返50(101*0.5=50.5)个积分;
                            e)  买家在完成该笔交易(订单状态为“已签收”)后才能得到此笔交易的相应积分,如购买商品参加店铺其他优惠,则优惠的金额部分不享受积分获取;
                            f)  买家在邮乐购物付款时可以使用积分,100积分抵扣1元。使用时最多可抵扣应付订单总额的30%或200元人民币,这两个条件以先达到的为准进行抵扣;
                            2. 积分有效期
                            积分自发放日起2年内有效,逾期自动失效。
                            3. 积分查询
                            您可在我的邮乐-我的邮乐积分板块查询积分获取及使用明细
                            4. 积分使用
                            a) 首先每个店铺的商品有最多可使用的积分数,您可以在确认订单页查看",
            'dial' => 1,
            'dial_pic' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-12/b5211dc0e3cb236704c56a878f9224bb.jpg',
            'cut_thread' => 1,
            'is_recommend' => 1,
            'recommend_count' => 3,
            'status' => 0,
            'is_comment' => 1,
            'is_sales' => 1,
            'is_member_price' => 1
        ];
    }
}
