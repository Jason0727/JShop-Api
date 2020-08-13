<?php

use Illuminate\Database\Seeder;
use App\Models\Good;
use Carbon\Carbon;

class GoodSeeder extends Seeder
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

        Good::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'name' => 'Apple iPhone 11 (A2223) 移动联通电信4G手机 双卡双待',
            'cover_pic_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/2b3a2dbf80cf612e05e1d2a62dcf89ab.jpg',
            'video_url' => 'https://vod.300hu.com/4c1f7a6atransbjngwcloud1oss/77746e18242645258386079745/v.f30.mp4?dockingId=550a7f41-8428-4ed5-b0cb-3e49c25062951',
            'category_id' => 3,
            'merchant_id' => 1,
            'sku_id' => 2,
            'type' => Good::TYPE_NORMAL,
            'price' => 1.5,
            'original_price' => 8.5,
            'status' => Good::STATUS_YES,
            'total_stock' => 21,
            'total_sales' => 210,
            'virtual_sales' => 10080,
            'weight' => 0.25,
            'is_hot' => Good::IS_HOT_YES,
            'is_member_discount' => Good::IS_MEMBER_DISCOUNT_YES,
            'freight_template_id' => 0,
            'service' => json_encode([
                '正品保障',
                '七天无理由退货',
                '快速退款'
            ]),
            'detail' => '品牌： Apple 商品名称：AppleiPhone 11商品编号：100008348542商品毛重：470.00g商品产地：中国大陆CPU型号：其他运行内存：其他机身存储：128GB存储卡：不支持存储卡摄像头数量：后置双摄后摄主摄像素：1200万像素前摄主摄像素：1200万像素主屏幕尺寸（英寸）：6.1英寸分辨率：其它分辨率屏幕比例：其它屏幕比例屏幕前摄组合：刘海屏充电器：其他热点：人脸识别特殊功能：语音命令操作系统：iOS(Apple)
            https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-08-13/2b3a2dbf80cf612e05e1d2a62dcf89ab.jpg 
            https://vod.300hu.com/4c1f7a6atransbjngwcloud1oss/77746e18242645258386079745/v.f30.mp4?dockingId=550a7f41-8428-4ed5-b0cb-3e49c25062951',
            'sort' => 0,
            'merchant_sort' => 0,
            'unit' => '件',
            'full_cut' => '{"pieces":"5","forehead":"100"}',
            'integral' => 10,
            'is_quick_purchase' => Good::IS_QUICK_PURCHASE_NO,
            'confine_count' => 0,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
