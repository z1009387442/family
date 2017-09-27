<?php

use Illuminate\Database\Seeder;
use App\Models\Businessdistrict;
class Business_districtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Businessdistrict::create([
        	'business_district_name'=>'淮海路',
        	'region_id'=>800,
        	'sort'=>50
        	]);
        Businessdistrict::create([
        	'business_district_name'=>'东方明珠塔',
        	'region_id'=>800,
        	'sort'=>50
        	]);
        Businessdistrict::create([
        	'business_district_name'=>'奥林匹克花园',
        	'region_id'=>1,
        	'sort'=>50
        	]);
        Businessdistrict::create([
        	'business_district_name'=>'滨海新区',
        	'region_id'=>18,
        	'sort'=>50
        	]);
    }
}
