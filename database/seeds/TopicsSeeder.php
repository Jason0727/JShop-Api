<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use Carbon\Carbon;

class TopicsSeeder extends Seeder
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

        Topic::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'id' => 1,
            'title' => '祖国70周年带来了哪些变化',
            'sub_title' => '祖国70周年',
            'platform_id' => 1,
            'tag_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/ced5b61b117dc1acccdb277d70c48269.png',
            'cover_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/7a9f9c70ea3dd99dcf09119fbece41c9.jpg',
            'share_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/3e840c6126a886aaf055963dd7f604c2.jpg',
            'topic_type_id' => 1,
            'content' => '<p>&lt;p&gt;【产品规格】净重5斤装（6-9颗左右）&lt;/p&gt;&lt;p&gt;【发货地】宿州砀山&lt;/p&gt;&lt;p&gt;【发货时间】48小时内发货，一般发货后2~4天到货。&lt;/p&gt;&lt;p&gt;【快递备注】圆通发货，新疆 西藏 海南 内蒙 甘肃 云南 青海 黑龙江 宁夏 港澳台不发货，其他地方包邮。&lt;/p&gt;&lt;p&gt;【特殊说明】早期青皮酥梨糖分很足很甜但是梨核有点大，后期越成熟核越小&lt;/p&gt;&lt;p&gt;【售后标准】由于生鲜产品特殊性，收到包裹请勿拒签，如有售后问题请24小时内联系客服提供运单照+产品照进行理赔，因个人口感问题、发货后改地址（快递收取改签费）、收货信息错误、出差、擅自拒收、无人签收等不在理赔范围。（生鲜产品运输过程中会有水分流失，误差在2两以内的不在售后范围内。）&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/5dec999de1321f48fdee56e9a0f79bc0.jpg&quot; title=&quot;详情1.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/c4c288116749ab44b64a2a52a07b0d7f.jpg&quot; title=&quot;详情4.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/da77a9739a923fc1413584212cb07966.jpg&quot; title=&quot;详情2.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/b4a658ce790ce27be422b54582a7d645.jpg&quot; title=&quot;详情6.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/3e5b52e2b405c09eb2df17d910398ab6.jpg&quot; title=&quot;详情5.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/7713bfce706ff247938ed7e6cb568364.png&quot; title=&quot;详情8.png&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/2f7d020668813eaad2b4f3a0026e1502.jpg&quot; title=&quot;详情9.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/78f297f9b4dad0fae3c24443f334ae4e.jpg&quot; title=&quot;详情10.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/2dcf1b69e8d0f4437c7ad0a5879d6bf8.jpg&quot; title=&quot;详情7.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/dfe51dbe8b5e7bfb800007f602a0bacb.jpg&quot; title=&quot;详情12.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/f05fbc33bfd10374eb69de8c12643902.jpg&quot; title=&quot;详情11.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;</p>',
            'read_count' => 800,
            'virtual_read_count' => 20000,
            'sort' => 0,
            'layout' => 0,
            'status' => Topic::STATUS_YES,
            'agree_count' => 10000,
            'virtual_agree_count' => 20000,
            'virtual_favorite_count' => 20000,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        $this->data[] = [
            'id' => 2,
            'title' => '飞蚂蚁旧衣回收',
            'sub_title' => '飞蚂蚁旧衣回收、家电回收',
            'platform_id' => 1,
            'tag_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/378aa259c6d68373772d5549b7610139.jpg',
            'cover_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/7a9f9c70ea3dd99dcf09119fbece41c9.jpg',
            'share_url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/3e840c6126a886aaf055963dd7f604c2.jpg',
            'topic_type_id' => 1,
            'content' => '<p>&lt;p&gt;【产品规格】净重5斤装（6-9颗左右）&lt;/p&gt;&lt;p&gt;【发货地】宿州砀山&lt;/p&gt;&lt;p&gt;【发货时间】48小时内发货，一般发货后2~4天到货。&lt;/p&gt;&lt;p&gt;【快递备注】圆通发货，新疆 西藏 海南 内蒙 甘肃 云南 青海 黑龙江 宁夏 港澳台不发货，其他地方包邮。&lt;/p&gt;&lt;p&gt;【特殊说明】早期青皮酥梨糖分很足很甜但是梨核有点大，后期越成熟核越小&lt;/p&gt;&lt;p&gt;【售后标准】由于生鲜产品特殊性，收到包裹请勿拒签，如有售后问题请24小时内联系客服提供运单照+产品照进行理赔，因个人口感问题、发货后改地址（快递收取改签费）、收货信息错误、出差、擅自拒收、无人签收等不在理赔范围。（生鲜产品运输过程中会有水分流失，误差在2两以内的不在售后范围内。）&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/5dec999de1321f48fdee56e9a0f79bc0.jpg&quot; title=&quot;详情1.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/c4c288116749ab44b64a2a52a07b0d7f.jpg&quot; title=&quot;详情4.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/da77a9739a923fc1413584212cb07966.jpg&quot; title=&quot;详情2.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/b4a658ce790ce27be422b54582a7d645.jpg&quot; title=&quot;详情6.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/3e5b52e2b405c09eb2df17d910398ab6.jpg&quot; title=&quot;详情5.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/7713bfce706ff247938ed7e6cb568364.png&quot; title=&quot;详情8.png&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/2f7d020668813eaad2b4f3a0026e1502.jpg&quot; title=&quot;详情9.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/78f297f9b4dad0fae3c24443f334ae4e.jpg&quot; title=&quot;详情10.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/2dcf1b69e8d0f4437c7ad0a5879d6bf8.jpg&quot; title=&quot;详情7.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/dfe51dbe8b5e7bfb800007f602a0bacb.jpg&quot; title=&quot;详情12.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://fmy90.oss-cn-beijing.aliyuncs.com/public/web/20191025/f05fbc33bfd10374eb69de8c12643902.jpg&quot; title=&quot;详情11.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;</p>',
            'read_count' => 800,
            'virtual_read_count' => 20000,
            'sort' => 0,
            'layout' => 0,
            'status' => Topic::STATUS_YES,
            'agree_count' => 10000,
            'virtual_agree_count' => 20000,
            'virtual_favorite_count' => 20000,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
