<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
class Rooms_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
        	'room_type_name'=>'单人间',
        	'bed_type'=>'一张单人床',
        	'max_people'=>1,
        	'type_img'=>'/uploads/e03b971957e4dc5a68118ff8c47014e8.jpg',
        	'room_area'=>20,
        	'rack_price'=>300,
        	'vip_price'=>280,
        	'room_desc'=>'配有独立卫生间，24小时提供热水',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'标准间',
        	'bed_type'=>'两张单人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/23db4aef869436400c1e9f966cec636b.jpg',
        	'room_area'=>30,
        	'rack_price'=>350,
        	'vip_price'=>320,
        	'room_desc'=>'这样的房间适合住两位客人和夫妻同住，适合旅游团体住用',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'双人间',
        	'bed_type'=>'一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/51c30c527c2b5e805b529b94d2761da9.jpg',
        	'room_area'=>30,
        	'rack_price'=>370,
        	'vip_price'=>350,
        	'room_desc'=>'适合夫妻入住',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'商务间',
        	'bed_type'=>'两张单人床/一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/3c39f7b08a6ba55c344081feb76de8eb.jpg',
        	'room_area'=>40,
        	'rack_price'=>500,
        	'vip_price'=>400,
        	'room_desc'=>'房内可以上网，满足商务客人的需求',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'豪华间',
        	'bed_type'=>'两张单人床/一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/388ee0771b8d8b5127064f3d6d768a6f.jpg',
        	'room_area'=>50,
        	'rack_price'=>550,
        	'vip_price'=>500,
        	'room_desc'=>'房间的装修，房内设施比标准间档次高',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'行政间',
        	'bed_type'=>'一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/c2fd784c4ebadbbc5ee91ae8e0fd0a8f.jpg',
        	'room_area'=>40,
        	'rack_price'=>550,
        	'vip_price'=>500,
        	'room_desc'=>'房间单独为一楼层，并配有专用的商务中心，咖啡厅',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'双套间',
        	'bed_type'=>'两张单人床/一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/485b3c4373e5a627409fe51e23e5fbf6.jpg',
        	'room_area'=>60,
        	'rack_price'=>640,
        	'vip_price'=>610,
        	'room_desc'=>'连通的两个房间。一间是会客室，一间是卧室。卧室内设两张单人床或一张双人床。这样的房间适合夫妻或旅游团住用。',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'组合套间',
        	'bed_type'=>'三张双人床',
        	'max_people'=>6,
        	'type_img'=>'/uploads/41f2fd12b9754e5f919039594716e8d4.jpg',
        	'room_area'=>80,
        	'rack_price'=>680,
        	'vip_price'=>640,
        	'room_desc'=>'这是一种根据需要专门设计的房间，每个房间都有卫生间。有的由两个对门的房组成；有的由中间有门有锁的隔壁两个房间组成；也有的由相邻的各有卫生间的三个房间组成',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'多套间',
        	'bed_type'=>'三张双人床',
        	'max_people'=>6,
        	'type_img'=>'/uploads/3c39f7b08a6ba55c344081feb76de8eb.jpg',
        	'room_area'=>80,
        	'rack_price'=>780,
        	'vip_price'=>730,
        	'room_desc'=>'由三至五间或更多房间组成，有两个卧室各带卫生间还有会客室、餐厅、办公室及厨房等，卧室内设特大号双人床',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'高级套间',
        	'bed_type'=>'四张双人床',
        	'max_people'=>8,
        	'type_img'=>'/uploads/9504c69aa2ff206e71daab1e335ed159.jpg',
        	'room_area'=>100,
        	'rack_price'=>800,
        	'vip_price'=>750,
        	'room_desc'=>'由七至八间房组成的套间，走廊有小酒吧。两个卧室分开，男女卫生间分开，设有客厅、书房、会议室、随员室、警卫室、餐厅厨房设施，有的还有室内花园。',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'复式套间',
        	'bed_type'=>'两张双人床',
        	'max_people'=>4,
        	'type_img'=>'/uploads/36e551faadb2265d36c08ca57dbbf805.jpg',
        	'room_area'=>80,
        	'rack_price'=>800,
        	'vip_price'=>750,
        	'room_desc'=>'由楼上、楼下两层组成，楼上为卧室，面积较小，设有两张单人床或一张双人床。楼下设有卫生间和会客室，室内有活动沙发，同时可以拉开当床',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'海景房',
        	'bed_type'=>'一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/b352c587448e1a3ff181b358db0d6eda.jpg',
        	'room_area'=>30,
        	'rack_price'=>520,
        	'vip_price'=>500,
        	'room_desc'=>'面朝大海，观看日出日落角度极佳',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'山景房',
        	'bed_type'=>'一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/c501100d11e1e083989677f8d90f218e.jpg',
        	'room_area'=>30,
        	'rack_price'=>480,
        	'vip_price'=>460,
        	'room_desc'=>'面朝秀山，窗户面向大山',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'亲子房',
        	'bed_type'=>'三张单人床',
        	'max_people'=>3,
        	'type_img'=>'/uploads/84074ea66bee300a8c23638ee1baddda.jpg',
        	'room_area'=>50,
        	'rack_price'=>580,
        	'vip_price'=>560,
        	'room_desc'=>'适合一家三口住宿',
        	'sort'=>50,
        	]);
        Type::create([
        	'room_type_name'=>'豪华海景房',
        	'bed_type'=>'一张双人床',
        	'max_people'=>2,
        	'type_img'=>'/uploads/d2a9f9b25ac76d2cf31616aebec50f43.jpg',
        	'room_area'=>40,
        	'rack_price'=>680,
        	'vip_price'=>660,
        	'room_desc'=>'直面大海，看日出，吹海风',
        	'sort'=>50,
        	]);
    }
}