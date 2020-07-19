<?php

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsSeeder extends Seeder
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

        Option::query()->insert($this->data);
    }

    /**
     * 格式化数据
     */
    private function formatData()
    {
        $this->data[] = [
            'title' => '商城配置',
            'key' => 'STORE_CONFIG',
            'value' => json_encode([
                'name' => '胖海豚', # 商城名称
                'logo' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-29/a9d0e3956d3830319a84627b4bfde01c.jpg', # 商城Logo Url
                'copyright' => '', # 版权描述
                'copyright_pic_url' => '', # 版权图标url
                'copyright_url' => '', # 版权超链接
                'contact_tel' => '13601587485', # 联系电话
                'show_customer_service' => 1, # 是否显示在线客服 0 否 1 是
                'customer_service_url' => "https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-28/3ad1386a0c0f25f5badbc629baeed40e.jpg", # 客服图标url
                'cat_style' => 1, # 分类页面样式
                'cat_goods_count' => 2, # 首页分类展示数量
                'address' => "上海上海市浦东新区博兴路1768弄28号", # 商城地址
                'is_offline' => 1, # 是否开启自提 0 否 1 是
                'is_coupon' => 1, # 是否开启优惠券 0 否 1 是
                'is_comment' => 1, # 是否开启评论功能 0 否 1 是
                'is_share_price' => 1, # 分销价是否展示 0 否 1 是
                'is_member_price' => 1, # 会员价是否展示 0 否 1 是
                'dial' => 1, # 一键拨号开关是否开启 0 否 1 是
                'dial_pic' => "https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-28/f07fe0d1e646212aac69041c2d276ff1.jpg", # 拨号图标url
                'cut_thread' => 1, # 是否开启分类分割线 0 否 1 是
                'purchase_frame' => 1, # 是否开启购买人滚动 0 否 1 是
                'is_sales' => 1, # 是否显示商品销量 0 否 1 是
                'quick_navigation_type' => 0, # 快捷导航 0 关闭 1 点击收起 2 全部展示
                'home_img' => "https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-29/567e6cd3050a7727b4f249b11fd0bd95.jpg", # 导航-返回首页图标url
                'buy_member' => 1, # 是否支持购买会员 0 不支持 1 支持
                'home_nav_count' => 0, # 首页导航每行显示的个数 0 4个 1 5个
            ], JSON_UNESCAPED_UNICODE)
        ];
        $this->data[] = [
            'title' => '服务器默认图片',
            'key' => 'SERVICE_DEFAULT_IMG',
            'value' => json_encode([
                'integralMall' => [ # 模块名称
                    'register' => [ # 小程序页面
                        'register_bg' => [ # 图片名称
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2d7d3b3447a127c97e70e4927a937a32.png' # 图片路径
                        ]
                    ]
                ],
                'pond' => [
                    'pond' => [
                        'pond_head' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/7da29d9823f096b7fa478a8a3078c836.png'
                        ],
                        'pond_success' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c617add4362e9f2a45ac8f2cdf2ce820.png'
                        ],
                        'pond_empty' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d74889b4b4f965e4edea9a335cc93215.png'
                        ]
                    ]
                ],
                'bargain' => [
                    'bargain_goods' => [
                        'time_bg' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/57caf57430893dbf8c5d13f721b09c24.png'
                        ],
                        'flow' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/58a8215106cc4bfed9dd9d37c5461d4e.png'
                        ],
                        'click' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/0095d7f035c953a4ef470a8d5030d2c1.png'
                        ],
                        'help' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/48b0dc5f353e301e7db4797124ccda92.png'
                        ],
                        'price' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c62d34145ed78dc166609748a4d9d610.png'
                        ],
                        'buy' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/17758e30cb4f1098472fcc8eaba46da5.png'
                        ],
                        'jiantou' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/779cfec11ee6a6c74107a4f39544463b.png'
                        ],
                        'shuoming' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/51f9f1811c5fea2a96476c03bdfaddfe.png'
                        ],
                        'goods' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/e804a2d6b0827982c28f3248029e1a28.png'
                        ]
                    ],
                    'activity' => [
                        'bg' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/986a5477327877eb5d4e0a3fe67b4bde.png'
                        ],
                        'buy' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d2809bb640fc22663eb6dea0aea9b270.png'
                        ],
                        'continue' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/fe021bb4594c019b88dc3d1bc478a25f.png'
                        ],
                        'progress' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/1ba6ac3d15fd50fad3ada4282eaa2b10.png'
                        ],
                        'used' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/46a7910dc06cc4682f02fbfb54bbbc79.png'
                        ],
                        'down' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/3371a689fdfdef810e36fcb4c84b06cf.png'
                        ],
                        'up' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a73a29b7569593dad01ab70f83a63625.png'
                        ],
                        'join' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2ba1803e72bf44dc14d4ecf83a1f2cbe.png'
                        ],
                        'header_bg' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/65bbb2f3e63a09e158f4735cf6eeec19.png'
                        ],
                        'help' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b6dd8381b363f6a10fab11cafe47195f.png'
                        ],
                        'join_m' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c56f4e8aaf1b1c02ef27bd321525e86e.png'
                        ],
                        'x' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/99aea556adc69499de0513a7a3d3a1d9.png'
                        ],
                        'more' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/299f43bd578e5d4f8ca0da8fe7e067fc.png'
                        ],
                        'buy_b' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/752232d9ea729046b83a09dc2ac4b05b.png'
                        ],
                        'header_bg_1' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8369fc6b9b903cfc25c5df56e3588ce8.png'
                        ],
                        'header_bg_2' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/3fc5ce7b820ea61ca64de468da2cd880.png'
                        ],
                        'header_bg_3' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ba9d3c573f3f0ca00435f76860e76e93.gif'
                        ],
                    ],
                    'list' => [
                        'right' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/41f9f1daa1e0ac6609b2777234a90971.png'
                        ]
                    ]
                ],
                'store' => [
                    'disabled' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d23245532fef2f464b1bb1000b046a96.png'
                    ],
                    'bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/1a243bf809e96579c0aa52c813681dd0.png'
                    ],
                    'car' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2f118f89e0cc3283a1eed7e1e3be1db0.png'
                    ],
                    'binding_pic' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/7ce89921a73ce70cc7d594b6120ffb9f.png'
                    ],
                    'gold' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b2c8476377ec08696e01380cc2944e5c.png'
                    ],
                    'clear' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/e9c50c1eb6a7da902203991dc3acf75a.png'
                    ],
                    'good_recommend' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/4715fee0b41bfbf3e4a62e21ff6703fa.png'
                    ],
                    'guige' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/4937d2ed7daabc7d5320633096b3f643.jpg'
                    ],
                    'home_gwc' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a2100305d52aa329df305ef0bddf8b54.png'
                    ],
                    'huiyuan_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/5cf276a30a3888b61850d5498036c9d9.png'
                    ],
                    'check' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/e47672c862a837aec1ba9004270f7a00.png'
                    ],
                    'checked' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/180deb61f8d2e337aa380b537577eb41.png'
                    ],
                    'clerk' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ef4d960cb8e2bc2381c1b0fc635062b7.png'
                    ],
                    'close' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/556ba5f34f854e0808cb83d61a24f3f5.png'
                    ],
                    'close2' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/0c2e8822713b61dd8f10df49dc9fcd01.png'
                    ],
                    'close3' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2b277e42a812399eb16920263f3a7466.png'
                    ],
                    'close4' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2e4b618b95dc91d0ad8cfc436f5f038a.png'
                    ],
                    'delete' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/5e6ed280a18cb7902a34a8c296f91fe4.png'
                    ],
                    'detail_love' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8d4fe1782ad6a9312bed4a33ee511a59.png'
                    ],
                    'edit' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/9a87683a0d2a35e7715ce58a23bdf7d9.png'
                    ],
                    'favorite' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/bbf9cc8c8c9b1ec2ff9506154a305f2a.png'
                    ],
                    'favorite_active' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b0a437e0c09810c0b525858a65dc38ba.png'
                    ],
                    'good_shop' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a8f065548c1b21987c4e39d10f4fb5b1.png'
                    ],
                    'group_share' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/bc4e83d44a7e8cc13ed468e8808a3b5f.png'
                    ],
                    'image_picker' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ff2d176136166002fc3bb48eeb23e456.png'
                    ],
                    'jiantou_r' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/1ae525dfcfc55a203a819c45ab86f158.png'
                    ],
                    'member_rights' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c01685d74a70afcda5843a8ae05aa514.png'
                    ],
                    'my_exchange' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/47990ecd59e25eb1a08e76c2c26e3d7c.png'
                    ],
                    'ntegration' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b8b32a9b7a54f6b46e748ba49cc6b299.png'
                    ],
                    'pay_right' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/720b3e0d64907fe8fb7d9c30be0dd83c.png'
                    ],
                    'icon_play' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/f602722a133b6177dd9537ff3212e4f4.png'
                    ],
                    'service' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/510397e5e067bfec8202842f575824bf.png'
                    ],
                    'shuoming' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d19c7fc2523a27e2f23c653dcdabad22.png'
                    ],
                    'store' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b019e6740597f3605f8e48144a399e9f.png'
                    ],
                    'time_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d8d4826b01d2ad342600b8cb95085007.png'
                    ],
                    'time_split' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a523e4a7e696e73367ccbe180992b574.png'
                    ],
                    'uncheck' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ced646adbea8b73504dfc4ce83eada8a.png'
                    ],
                    'up' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8b0cee779797312b983da99d14d442f3.png'
                    ],
                    'address' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/26f7f99de5f25cf9cf0da861a1ca1c0f.png'
                    ],
                    'order_status_bar' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/54d8a90a9e94e0faf1b127bd2735e12c.png'
                    ],
                    'pc_login' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/734951c5b2a2dfc204bdd53a4442f6b6.png'
                    ],
                    'jia' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/523536215a28d3f89513a24bd58b938f.png'
                    ],
                    'jian' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/36627e4cfafd44997f4243125eca81ff.png'
                    ],
                    'jiangli' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/81e1f0a93473872ee1e929f08ac64f4a.png'
                    ],
                    'quick_hot' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d21fab7748eca9b32846cef8a40aaeb1.png'
                    ],
                    'search_index' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b5d8b033501328008e25a4716bea2484.png'
                    ],
                    'shou' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a808de452d84698469b11a75ebf5f105.png'
                    ],
                    'video_play' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/07f1a828e36830404b4fa135369debcc.png'
                    ],
                    'yougoods' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/690665383848279a23b7b8fbc5a8215d.jpg'
                    ],
                    'binding' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/35838c5f9f4189b835fd8e307489056c.png',
                        'remark' => '绑定公众号'
                    ],
                    'binding_yes' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/781e650b31c8e03cb03bd0cb3782830f.png',
                        'remark' => '已绑定公众号'
                    ],
                    'share_commission' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/0122683bc76d7df65690352548b83df5.png',
                        'remark' => '商品详情分销价'
                    ],
                    'member_price' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2b46ee33f633c715573aefc555613950.png',
                        'remark' => '商品详情会员价'
                    ]
                ],
                'pt' => [
                    'active' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/489fd76b2ecf66d5678eeed7c8e68663.png'
                    ],
                    'text' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b652aeeaef2199f16a6a0ba256b803df.png'
                    ],
                    'group_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/0916d73e343115926dd154bfa1d50c28.png'
                    ],
                    'address_bottom' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/847a62f04df7f9467d7413824b28ae90.png'
                    ],
                    'address_top' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8dc05bc466fecd76605cb77ac1772ce8.png'
                    ],
                    'address' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/4a943c9e61d1645fcbba41a91bc1f482.png'
                    ],
                    'details' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8cf673955df2e2e193bac17008527005.png'
                    ],
                    'empty_order' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/31a2c6674a9896fb627a238d3cce10de.png'
                    ],
                    'fail' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8b84cadbaf352a33419e5bd8ccb14114.png'
                    ],
                    'favorite' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ce0b75e4c6256f618f25581fc63c7abd.png'
                    ],
                    'go_home' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2f426109633fbeb4a2c6ced7f941af73.png'
                    ],
                    'no_group_num' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/afb67c5bbf4f4eb6d4c3425bfc9acf1a.png'
                    ],
                    'search_clear' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/3e8470657fc215f42894e49054d28d38.png'
                    ],
                    'search' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a389d2b6325bade65d3d8215e848bbc3.png'
                    ],
                    'shop_car' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/9cc4226a84822d1a41fe082825a7368f.png'
                    ],
                    'success' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/3bfd9513d6e137b7a8f5b75f7cac7674.png'
                    ]
                ],
                'balance' => [
                    'left' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/76d89a5b63cb1f19f97d3abee9a5086b.png'
                    ],
                    'right' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/769e42ffb9350da7dcc88547cb7cc180.png'
                    ],
                    'recharge' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/5a062e1461ea7949cb7fc0aa3b145146.png'
                    ],
                    'recharge_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/04a130957a372b6fba735b20f6a94565.png'
                    ]
                ],
                'card' => [
                    'btn' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/60c38d59e97a8e76d4d9356c50a6ffd8.png'
                    ],
                    'del' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/7edf61986b347be4cbc4481b7b6db316.png'
                    ],
                    'qrcode' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/5ae092dfa145d6587fd21ab6fe32873a.png'
                    ],
                    'top' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c87ff8d7c161f2926d37b95cf3cbef52.png'
                    ]
                ],
                'coupon' => [
                    'coupon' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c0541df5b79795495c3c00f21a407dde.png'
                    ],
                    'disabled' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/34f03dc9f108418506380ed3e61fbcba.png'
                    ],
                    'enabled' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/bfacb26c311f9d543d492afdb1e660a3.png'
                    ],
                    'index' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8b82ae9ebff6f8f7491f8732f12a33c7.png'
                    ],
                    'no' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/3bb52c69570af4b04c83809017b4f5a9.png'
                    ],
                    'bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ba9ca6972b59797603495f192c54bc40.png'
                    ],
                    'item_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/450c68b63a489917f871ad60cfcaffa9.png'
                    ]
                ],
                'system' => [
                    'wechatapp' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/f3f14ad8980efc7c9607c0d94097d017.png'
                    ],
                    'yuyue' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/7eee391f9ebe52bb78513798958b37a0.png'
                    ],
                    'loading' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a32e580e411d502b7406896c27f940ea.svg'
                    ],
                    'loading2' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/133e0f687470d2f9afdab628a7aca721.svg'
                    ],
                    'loading_black' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/baecb09a9dd64117aeb73058a5aaa318.svg'
                    ],
                    'alipay' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/66941a25c4d90b79ee76fc25d94ac0a4.png'
                    ]
                ],
                'integral' => [
                    'all' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a67ba3cf089d0dc7255221248daf5ed7.png'
                    ],
                    'close' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b9b45c21ad777c4f1f72711e55f1b83c.png'
                    ],
                    'detail' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/7be674b3e1da2a74e7e5fa640c7bcf76.png'
                    ],
                    'head' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/af708ad3e6a9222f91aa0c3927166aa4.png'
                    ],
                    'shibai' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/537921e0d338ba9618cf5e7a6f4768f3.png'
                    ],
                    'success' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/6d681e30d5dffe6d772a053eae3cb91d.png'
                    ]
                ],
                'miaosha' => [
                    'miaosha' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/9e64d2a8f8a8dca12c05917f78158c47.png'
                    ],
                    'ms_activity_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b5585ff2123987387af810834214667b.png',
                        'remark' => '秒杀活动到计时背景图'
                    ],
                ],
                'notice' => [
                    'jiantou' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/833a890aa603e33b41c50fb1225b17b4.png'
                    ],
                    'title' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/dff907760404cc62b56d7e5947446b0f.png'
                    ],
                    'notice' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2dc49ed8a130771a35a2c67d052d3179.png'
                    ],
                ],
                'point' => [
                    'gray' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/52c5260577d64ca65bd1d72f64ce691a.png'
                    ],
                    'green' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b10b9c4d870aba1cca2d48a5208bc755.png'
                    ]
                ],
                'register' => [
                    'register' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/90ce395ce3623e4b60a37abc2e66c651.png'
                    ],
                    'is_register' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b4d98e2d8a37b11c70fda901a576ee31.png'
                    ],
                    'close' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/06220798fc5485cab8cb06813f923e6c.png'
                    ],
                    'head' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8b1e1f9b941a11abbb2aab488d804e92.png'
                    ],
                    'left' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/4dd097f51904a5717d38de421afe2f33.png'
                    ],
                    'right' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/0203aa758bff4991796d18b8d2d898ec.png'
                    ],
                    'quan' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/59bddebf7b733b9e1ba385b7832ee4c2.png'
                    ],
                    'sign_in' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d5cd603d9b04ee418a8abdd7d9708d84.png'
                    ],
                ],
                'search' => [
                    'search' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/cd525f9955a917ab720b49837321f719.png'
                    ],
                    'search_no' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/510265a078918f90239777f301e248f6.png'
                    ],
                    's_up' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/71338cb2912b39d72e4cd3bea8ba3b3d.png'
                    ]
                ],
                'share' => [
                    'share' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/78446852531fad7382869a7e502cf27b.png'
                    ],
                    'ant' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b2b39fd58fd642f4bce476a0fe4bb056.png'
                    ],
                    'bank' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/72ca45dd85e955b235784a79934e3444.png'
                    ],
                    'friend' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/69f73d05b9c831c26474eaa445fbb537.png'
                    ],
                    'qrcode' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c2c42823aa7f5a2f70547da4006f149f.png'
                    ],
                    'selected' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/6b8bb21eeb087bda34ef190cef13a810.png'
                    ],
                    'tip' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8034b961049819b1e8eb4b48f43eba51.png'
                    ],
                    'wechat' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a7ef2c196a0e0d4a7d27da85bef84b1b.png'
                    ],
                    'down' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/43fd622f6a3f5ac817a110bdb5bb422e.png'
                    ],
                    'info' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/cbf2ecfbd503139daaeedc314598f94e.png'
                    ],
                    'money' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c642ae11023a1c509e39a762049688c0.png'
                    ],
                    'img_qrcode' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/4d8d885d67ee86a4ec6c98a76083b5f2.png'
                    ],
                    'right' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d187ee5d3e14fb9be2825fdd0ec9fbcc.png'
                    ],
                    'shop' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/dffed41085e9d3c21e1d2035ce2efbb4.png'
                    ]
                ],
                'shop' => [
                    'dingwei' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/13483663dbcebc916d0d2999da96549c.png'
                    ],
                    'love' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ee0930e0c4fbb48d4b209f393022cc19.png'
                    ],
                    'nav' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ea38cbcbc08eb52c10066f115996e93c.png'
                    ],
                    'nav_one' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/f4f1f608e59eabda8fc77c5c486f5901.png'
                    ],
                    'search' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/165e337bd357423f13facb1e9f54cb50.png'
                    ],
                    'tel' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/28fea6da93d0437b9a579037f334d295.png'
                    ],
                    'down' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8c53db302091e3e513465048853b2551.png'
                    ]
                ],
                'sort' => [
                    'down' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b96cd31d1aa4f81587785dd387aa5fd5.png'
                    ],
                    'down_active' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/5d68cb5893ebcee7847abfb827ef8675.png'
                    ],
                    'up' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/e4d984b6a096a24b99ac52330072fef5.png'
                    ],
                    'up_active' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/d96559b1495c26dc4b56ab9cc0454edb.png'
                    ],
                ],
                'topic' => [
                    'love' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/f0763124b1dd5f99beca34716766d11f.png'
                    ],
                    'love_active' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/517f1d9dc8880766d51df41f74fc02e2.png'
                    ],
                    'share' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/24ad515a502674c0b2c9a143bee31b95.png'
                    ]
                ],
                'user' => [
                    'kf' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2ad934a430024e34a48365bdba12c50f.png'
                    ],
                    'level' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a2919f919950195a6f8dcba54181ce47.png'
                    ],
                    'balance' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/6f42802141e077e2073590868fad487c.png'
                    ],
                    'wallet' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/dd4fec1ee35f80ecddf6368ce6ef2d69.png'
                    ],
                    'integral' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/8e1feace66e4703482c6a94fd1ec26da.png'
                    ],
                    'coupon_xia' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/615c66e78c0a8e0a0270e1caa82ff75b.png'
                    ]
                ],
                'cart' => [
                    'add' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/fe8e7a49879b509ea489f0493357e39b.png'
                    ],
                    'less' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/c915d9ab0ab22ad1e89c5bbbf96428d6.png'
                    ],
                    'no_add' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/19316bfa209e1227837cbe36d789e592.png'
                    ],
                    'no_less' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ce8d763b1192e1b31c159eeab620a520.png'
                    ],
                ],
                'nav' => [
                    'cart' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/60cdb45434e34321e59d5c16aff2b483.png'
                    ],
                    'index' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/584b88dbd007c2e16d2e737bcf882ed5.png'
                    ]
                ],
                'yy' => [
                    'form_title' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/05488638f2c5a53408fec7c9b655d006.png'
                    ]
                ],
                'scratch' => [
                    'index' => [
                        'scratch_bg' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/56173aa857ead9fb8ba1028267994228.png'
                        ],
                        'scratch_success' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/cd410be1e6579dc784bd43c871d282f7.png'
                        ]
                    ]
                ],
                'goods' => [
                    'goods' => [
                        'address' => [
                            'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/2c5e6775b9198767962f42654f656aa6.png'
                        ]
                    ]
                ],
                'step' => [
                    'dare_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/ec8983682a216a47fce6d33b2df16601.png'
                    ],
                    'home_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/70669c294cf46d5929db5c8ec6ced1c5.png'
                    ],
                    'join_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/1955572c9aa19b2878fd90b55dbed8b3.png'
                    ],
                    'detail_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/b62984078276cc62f803db1091cd7ba9.png'
                    ],
                    'log_bg' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/a9de64fce57b30cddda92ab94b011ecd.png'
                    ],
                ],
                'lottery' => [
                    'time' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/bff84893882b5d6aa437cabe70c6a779.png'
                    ]
                ],
                'cell' => [
                    'cell_1' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/978f7752fdc74879e4fe880ee9ef76f8.png'
                    ],
                    'cell_2' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/5d1c163ac140e31254d0be3c9da40b65.png'
                    ],
                    'cell_3' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/be48beed2fc8115bd7256728f158d0c5.png'
                    ],
                    'cell_4' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/559bd060a696863db32e7d1daebc5f50.png'
                    ],
                    'cell_5' => [
                        'url' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-09/fd4bdf1b4b0cabb0cfb562dc02931cdd.png'
                    ],
                ]
            ], JSON_UNESCAPED_UNICODE)
        ];
        $this->data[] = [
            'title' => '首页模块',
            'key' => 'HOME_PAGE_MODULE',
            'value' => json_encode([
                ['name' => 'notice'],
                ['name' => 'search'],
                ['name' => 'banner'],
                ['name' => 'nav'],
                ['name' => 'topic'],
                ['name' => 'coupon'],
                ['name' => 'miaosha'],
                ['name' => 'block-1'],
                ['name' => 'pintuan'],
                ['name' => 'video-1'],
                ['name' => 'yuyue'],
                ['name' => 'single_cat-1'],
                ['name' => 'all_cat'],
            ], JSON_UNESCAPED_UNICODE)
        ];
        $this->data[] = [
            'title' => '分销商配置',
            'key' => 'SHARE_CUSTOM_DATA',
            'value' => json_encode([
                'menus' => [
                    'money' => [
                        'name' => '分销佣金',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-12/df76230475dc2bf25df5e4b35f35f6a7.png',
                        'open_type' => 'navigator',
                        'url' => '/pages/share-money/share-money',
                        'tel' => '',
                    ],
                    'order' => [
                        'name' => '分销订单',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-28/0f57bcfe99b1d949801b274437ebb302.png',
                        'open_type' => 'navigator',
                        'url' => '/pages/share-order/share-order',
                        'tel' => '',
                    ],
                    'cash' => [
                        'name' => '提现明细',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-28/a250e5b5fc365e93613b2bdf9e4ce8e7.png',
                        'open_type' => 'navigator',
                        'url' => '/pages/cash-detail/cash-detail',
                        'tel' => '',
                    ],
                    'team' => [
                        'name' => '我的团队',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-28/9808f69cc0323b622612a291be0e515a.png',
                        'open_type' => 'navigator',
                        'url' => '/pages/share-team/share-team',
                        'tel' => '',
                    ],
                    'qrcode' => [
                        'name' => '推广二维码',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-06-28/2180834d247b678cdb07bc3493aea60d.png',
                        'open_type' => 'navigator',
                        'url' => '/pages/share-qrcode/share-qrcode',
                        'tel' => '',
                    ],
                ],
                'words' => [
                    'can_be_presented' => [
                        'name' => '可提现佣金',
                        'default' => '可提现佣金',
                    ],
                    'already_presented' => [
                        'name' => '已提现佣金',
                        'default' => '已提现佣金',
                    ],
                    'parent_name' => [
                        'name' => '推荐人',
                        'default' => '推荐人',
                    ],
                    'pending_money' => [
                        'name' => '待打款佣金',
                        'default' => '待打款佣金',
                    ],
                    'cash' => [
                        'name' => '提现',
                        'default' => '提现',
                    ],
                    'user_instructions' => [
                        'name' => '用户须知',
                        'default' => '用户须知',
                    ],
                    'apply_cash' => [
                        'name' => '我要提现',
                        'default' => '我要提现',
                    ],
                    'cash_type' => [
                        'name' => '提现方式',
                        'default' => '提现方式',
                    ],
                    'cash_money' => [
                        'name' => '提现金额',
                        'default' => '提现金额',
                    ],
                    'order_money_un' => [
                        'name' => '未结算佣金',
                        'default' => '未结算佣金',
                    ],
                    'share_name' => [
                        'name' => '分销商',
                        'default' => '分销商',
                    ],
                ]
            ], JSON_UNESCAPED_UNICODE)
        ];
        $this->data[] = [
            'title' => '顶部导航栏配置',
            'key' => 'TOP_NAV_BAR',
            'value' => json_encode([
                'frontColor' => '#ffffff', # 字体颜色
                'backgroundColor' => '#81f016', # 背景颜色
                'bottomBackgroundColor' => '#6ef806' # 按钮背景颜色
            ], JSON_UNESCAPED_UNICODE)
        ];
        $this->data[] = [
            'title' => '底部导航栏配置',
            'key' => 'BOTTOM_NAV_BAR',
            'value' => json_encode([
                'background_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEX///+nxBvIAAAACklEQVQI12NgAAAAAgAB4iG8MwAAAABJRU5ErkJggg==',
                'border_color' => 'rgba(0,0,0,.1)',
                'navs' => [
                    [
                        'url' => '/pages/index/index',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/1751449a7bfd94fc608e6d42bb606b2e.png',
                        'active_icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/f3431ec831e75cda3acbab28408bebb2.png',
                        'text' => '首页',
                        'color' => '#888',
                        'active_color' => '#ff4544',
                        'open_type' => '',
                        'new_url' => '/pages/index/index',
                    ],
                    [
                        'url' => '/pages/cat/cat',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/2499f286e07137200a48007e0d1a220a.png',
                        'active_icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/328c6dec669434f1697cb4758cfa26d5.png',
                        'text' => '分类',
                        'color' => '#888',
                        'active_color' => '#ff4544',
                        'open_type' => '',
                        'new_url' => '/pages/cat/cat',
                    ],
                    [
                        'url' => '/pages/cart/cart',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/34686c42ce7228b2aa8eda14816ec706.png',
                        'active_icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/e41377a2d6dd928d66a5feee1216afea.png',
                        'text' => '购物车',
                        'color' => '#888',
                        'active_color' => '#ff4544',
                        'open_type' => '',
                        'new_url' => '/pages/cart/cart',
                    ],
                    [
                        'url' => '/pages/user/user',
                        'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/0da8aa9df3441d82fff44af29aa43b76.png',
                        'active_icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-03/9c41b2b861d59e1f2c08c125c84979b1.png',
                        'text' => '我',
                        'color' => '#888',
                        'active_color' => '#ff4544',
                        'open_type' => '',
                        'new_url' => '/pages/user/user',
                    ]
                ]
            ], JSON_UNESCAPED_UNICODE)
        ];
        $this->data[] = [
            'title' => '专题配置',
            'key' => 'TOPIC_CONFIG',
            'value' => json_encode([
                'icon' => 'https://dolphin-shop.oss-cn-shanghai.aliyuncs.com/images/2020-07-19/e86fd21dfd999881eab4acd6f41a21ec.png'
            ], JSON_UNESCAPED_UNICODE)
        ];
    }
}
