<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admin')->insert([
            'name' =>'root',
            'pwd' =>'123456',
            'tel' =>'18612537309',
            'email' =>'123@qq.com',
        ]);

       DB::table('user')->insert([
            'user_name' =>'root',
            'user_pwd' =>'96e79218965eb72c92a549dd5a330112',
            'email' =>'543182875@qq.com',
            'integral' =>'99999',
            'tel'=>'',
            'img'=>'',
            'balance'=>'',
        ]);

        DB::table('rooms_type')->insert([
            ['room_type_name' =>'浪漫小屋',
            'bed_type' =>'双人床',
            'max_people' =>'1',
            'type_img' =>'/uploads/57025d1150a23552befd016c9591cc8d.jpg',
            'room_area'=>'50',
            'rack_price'=>'232',
            'vip_price'=>'198',
            'room_desc'=>'想咋咕噜咋咕噜',
            'status'=>'1'],
            [ 'rooms_type_name' =>'单身自由',
            'bed_type' =>'单人床',
            'max_people' =>'1',
            'type_img' =>'/uploads/57025d1150a23552befd016c9591cc8d.jpg',
            'room_area'=>'50',
            'rack_price'=>'232',
            'vip_price'=>'198',
            'room_desc'=>'一个想咋咕噜咋咕噜',
            'status'=>'1',
        ]
        ]);

        DB::table('rooms_facilities')->insert([
            ['rooms_facilities_name' =>'无线wifi',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'空调',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'电视',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'独立卫生间',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'24小时热水',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'免费洗漱用品',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'电吹风',
            'status' =>'1',
            'sort' =>'1',
            ],
            ['rooms_facilities_name' =>'拖鞋',
            'status' =>'1',
            'sort' =>'1',
            ],        
        ]);

         DB::table('rooms')->insert([
            ['hotel_id' =>'1',
            'room_type_id' =>'1',
            'status' =>'1',
            'room_floor' =>'6-6206',
            'room_dicection'=>'435665',
            'room_number'=>'6535',
            ],
            ['hotel_id' =>'2',
            'room_type_id' =>'1',
            'status' =>'1',
            'room_floor' =>'6-6206',
            'room_dicection'=>'435665',
            'room_number'=>'6535',
            ],
        ]);

          DB::table('hotel_room_type')->insert([
            ['hotel_room_type_id' =>'1',
            'hotel_id' =>'2',
            ],
            ['hotel_room_type_id' =>'2',
            'hotel_id' =>'2',
            ],
        ]);
        //    DB::table('hotel')->insert([
        //     ['hotel_name' =>'汉庭北京长椿街酒店 (内宾) ',
        //     'region_id' =>'12',
        //     'sort'      =>'50',
        //     'hotel_img' =>'/uploads/0bdbf57b1f386c41b26bc6190566ca20.jpg',
        //     'hotel_address'=>'北京市西城区长椿街甲18号',
        //     'hotel_tel' => '13522933162',
        //     'hotel_fax' => '2313-13131',
        //     'hotel_desc' =>'汉庭深圳大鹏佳兆业酒店位于大鹏街道大鹏商业中心地带，可口美食、购物中心、步行1-3分钟抵达，距离大鹏汽车站200米，距深圳旅游景点金沙湾、较场尾、大鹏所城、观音山等地需10分钟车程，大小梅沙、东西冲均可在30分钟内抵达，交通便利。酒店由华住酒店集团名师精心设计打造，以贴近现代简约生活气息为主题，自助早餐、高清智能电视、WIFI全覆盖、高品质洗漱用品、商务区、书香区、免费停车场等设施一应俱全，满足您',
        //     'hotel_hint' =>'酒店通常在14：00后开始办理入住，如果早到可能需要等待',
        //     'complex_facilities_id' => '1,2,3,4,5',
        //     'rooms_facilities_id'   => '1,2,3,6,7,8,9,10',
        //     'status' => '1',
        //     ],
        //     ['hotel_name' =>'汉庭北京长椿街酒店 (内宾) ',
        //     'region_id' =>'12',
        //     'sort'      =>'50',
        //     'hotel_img' =>'/uploads/0bdbf57b1f386c41b26bc6190566ca20.jpg',
        //     'hotel_address'=>'北京市西城区长椿街甲18号',
        //     'hotel_tel' => '13522933162',
        //     'hotel_fax' => '2313-13131',
        //     'hotel_desc' =>'汉庭深圳大鹏佳兆业酒店位于大鹏街道大鹏商业中心地带，可口美食、购物中心、步行1-3分钟抵达，距离大鹏汽车站200米，距深圳旅游景点金沙湾、较场尾、大鹏所城、观音山等地需10分钟车程，大小梅沙、东西冲均可在30分钟内抵达，交通便利。酒店由华住酒店集团名师精心设计打造，以贴近现代简约生活气息为主题，自助早餐、高清智能电视、WIFI全覆盖、高品质洗漱用品、商务区、书香区、免费停车场等设施一应俱全，满足您',
        //     'hotel_hint' =>'酒店通常在14：00后开始办理入住，如果早到可能需要等待',
        //     'complex_facilities_id' => '1,2,3,4,5',
        //     'rooms_facilities_id'   => '1,2,3,6,7,8,9,10',
        //     'status' => '1',
        //     ],
        // ]);

         DB::table('goods')->insert([
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'1000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/1000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'13000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/13000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'1000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/18000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'23000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/23000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'28000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/28000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'3000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/3000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'33000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/33000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'38000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/38000.jpg',
            'use_of'      =>'0-200',
            ],
            ['goods_name' =>'抵用券100元',
            'goods_price' =>'5000',
            'goods_desc'  =>'1、抵用券可用于抵扣房费使用；
                            2、无法一次性抵扣100元房费，预订时系统将自动抵扣，无需人工操作；
                            3、兑换成功后，您的VIP账户内将收到多张抵用券，合计面值为100元；
                            4、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；
                            5、最终解释权归桔子水晶酒店集团所有。',
            'goods_img'   =>'/integral/5000.jpg',
            'use_of'      =>'0-200',
            ],
            
        ]); 

         DB::table('complex_facilities')->insert([
            ['complex_facilities_name' =>'游戏池',
            'status' =>'1',
            'sort'   =>'1',
            ],
           ['complex_facilities_name' =>'大厅上网',
            'status' =>'1',
            'sort'   =>'1',
            ],
            ['complex_facilities_name' =>'停车场',
            'status' =>'1',
            'sort'   =>'1',
            ],
            ['complex_facilities_name' =>'免费咖啡饮料',
            'status' =>'1',
            'sort'   =>'1',
            ],
            ['complex_facilities_name' =>'商品销售',
            'status' =>'1',
            'sort'   =>'1',
            ],
            ['complex_facilities_name' =>'台球厅',
            'status' =>'1',
            'sort'   =>'1',
            ],
        ]);          
    }
}
