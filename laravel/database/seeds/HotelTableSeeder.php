<?php

use Illuminate\Database\Seeder;
use App\Models\Hotel;
class HotelTableSeeder extends Seeder
{
    /**
     * 填充酒店数据
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
        	'hotel_name'=>'上海桔子酒店',
        	'region_id'=>800,
        	'sort'=>50,
        	'hotel_img'=>'/uploads/b5b79898092f973b08675ebb5b966022.png',
        	'hotel_address'=>'上海市黄浦区长乐路161(瑞金一路口) ',
        	'hotel_tel'=>'010-56223665',
        	'hotel_fax'=>'121-55555555',
        	'hotel_desc'=>'上海新锦江大酒店 位于淮海路上海市黄浦区长乐路161(瑞金一路口)， 上海新锦江大酒店预订电话：400-666-5511
　　新锦江大酒店是“锦江酒店”旗下的豪华五星级商务酒店，坐落于上海繁华的淮海路商业中心。楼高43层，153米，拥有360度无遮挡全景视野，登高远眺，上海城市美景尽收眼底。
　　酒店于1990年正式营业以来接待了包括360多位国家元首和社会',
        	'hotel_hint'=>'入住时间：14:00以后      离店时间：12:00以前 入住时需要出示政府核发的身份证件(带照片)。请携带信用卡和现金用以支付押金或额外费用。不可携带宠物。该酒店支持刷卡付费',
        	'complex_facilities_id'=>'1,2,5,7',
        	'rooms_facilities_id'=>'1,2,3,5,7',
        	'business_district_id'=>1,
        	'brand_id'=>1,
        	'status'=>1,

        	]);
        Hotel::create([
        	'hotel_name'=>'上海凯宾斯基大酒店',
        	'region_id'=>800,
        	'sort'=>50,
        	'hotel_img'=>'/uploads/61df6d162f85566b87c24e4e5d24636f.jpg',
        	'hotel_address'=>'位于陆家嘴，距离东方明珠塔0.48公里',
        	'hotel_tel'=>'010-56223665',
        	'hotel_fax'=>'121-55555555',
        	'hotel_desc'=>'上海凯宾斯基大酒店 位于陆家嘴浦东新区陆家嘴环路1288号(近东园路)， 上海凯宾斯基大酒店预订电话：400-666-5511
陆家嘴地标 传承欧式奢华 - 上海凯宾斯基大酒店坐落于陆家嘴金融贸易中心核心地带，坐拥黄浦江和上海天际线迷人景致。步行即可前往东方明珠，距离外滩等上海知名地标建筑和景点仅需几分钟车程。酒店拥有 686 间客房和套房，可饱览开阔江景或都市',
        	'hotel_hint'=>'入住时间：14:00以后      离店时间：12:00以前， 入住时需要出示政府核发的身份证件(带照片)。请携带信用卡和现金用以支付押金或额外费用不可携带宠物。',
        	'complex_facilities_id'=>'1,3,5,7',
        	'rooms_facilities_id'=>'1,2,3,4,5,6',
        	'business_district_id'=>2,
        	'brand_id'=>5,
        	'status'=>1,

        	]);
        Hotel::create([
        	'hotel_name'=>'汉庭酒店(上海外滩外白渡桥店)',
        	'region_id'=>800,
        	'sort'=>50,
        	'hotel_img'=>'/uploads/ade821095e46aa643c39f280bbedce7c.jpg',
        	'hotel_address'=>'位于外滩，距离东方明珠塔0.81公里',
        	'hotel_tel'=>'010-56223665',
        	'hotel_fax'=>'121-55555555',
        	'hotel_desc'=>'汉庭酒店(上海外滩外白渡桥店) 位于外滩虹口区青浦路50号(外滩茂悦酒店旁)， 汉庭酒店(上海外滩外白渡桥店)预订电话：400-666-5511
汉庭酒店（上海外滩外白渡桥店）座落在市中心，黄浦江畔，位于外滩外白渡桥东面 100米。至外滩风景区步行5分钟，步行至南京路步行街、四川北路商业街15分钟，离城隍庙15分钟路程。可达酒店公交站点有868路，934路，37路，135路，到白渡桥',
        	'hotel_hint'=>'入住时间：14:00以后      离店时间：12:00以前',
        	'complex_facilities_id'=>'1,2',
        	'rooms_facilities_id'=>'3,,7,8,5',
        	'business_district_id'=>2,
        	'brand_id'=>2,
        	'status'=>1,

        	]);
        Hotel::create([
        	'hotel_name'=>'格林豪泰(北京安贞鸟巢商务酒店)',
        	'region_id'=>1,
        	'sort'=>50,
        	'hotel_img'=>'/uploads/57631be8581ca592f8d8a734ba24c481.png',
        	'hotel_address'=>'位于安贞，距离奥林匹克公园3.17公里',
        	'hotel_tel'=>'010-56223665',
        	'hotel_fax'=>'121-55555555',
        	'hotel_desc'=>'格林豪泰(北京安贞鸟巢商务酒店) 位于安贞朝阳区安贞西里2区甲17号(中国石油物资公司正对面小区内)， 格林豪泰(北京安贞鸟巢商务酒店)预订电话：400-666-5511格林豪泰北京安贞鸟巢商务酒店位于北京市朝阳区安贞西里二区，邻近安贞华联商厦，去往奥林匹克体育中心、鸟巢国家体育场、水立方国家游泳中心、奥林匹克公园、中国科技馆、元大都城垣遗址公园、百鸟园、中华民族博物馆、中华民族园等十分便利。',
        	'hotel_hint'=>'不可携带宠物入住时间：14:00以后      离店时间：12:00以前',
        	'complex_facilities_id'=>'3,,4,6,2,1',
        	'rooms_facilities_id'=>'2,8,1,6,4',
        	'business_district_id'=>3,
        	'brand_id'=>4,
        	'status'=>1,

        	]);
        Hotel::create([
        	'hotel_name'=>'如家快捷酒店(天津滨海三大街豪威大厦店)',
        	'region_id'=>18,
        	'sort'=>50,
        	'hotel_img'=>'/uploads/4c25a0fa4b9263011e19ac3c2c6aafff.png',
        	'hotel_address'=>'位于[开发区（滨海新区）]滨海新区塘沽开发区第三大街8号豪威大厦A座(与恂园东路交汇处) ',
        	'hotel_tel'=>'010-56223665',
        	'hotel_fax'=>'121-55555555',
        	'hotel_desc'=>' 如家快捷酒店(天津滨海三大街豪威大厦店) 位于开发区（滨海新区）滨海新区塘沽开发区第三大街8号豪威大厦A座(与恂园东路交汇处)， 如家快捷酒店(天津滨海三大街豪威大厦店)预订电话：400-666-5511如家快捷酒店（天津滨海新区三大街店）位于中国目前最具活力的经济特区－－天津滨海开发区第三大街8号豪威大厦A座，紧邻滨海新区管委会，海关大楼，金融街，泰达心血管医院、泰达体育场和开发区最繁华的',
        	'hotel_hint'=>'入住时间：14:00以后      离店时间：12:00以前',
        	'complex_facilities_id'=>'1,5,7',
        	'rooms_facilities_id'=>'1,3,6,2',
        	'business_district_id'=>4,
        	'brand_id'=>3,
        	'status'=>1,

        	]);
    }
}
