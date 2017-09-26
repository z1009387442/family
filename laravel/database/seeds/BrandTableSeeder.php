<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
        	'brand_name'=>'桔子',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'汉庭',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'洲际酒店',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'香格里拉',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'半岛酒店',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'万豪',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'四季酒店',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'喜达屋酒店',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'凯瑞国际酒店',
        	'sort'=>50
        	]);
        Brand::create([
        	'brand_name'=>'漫心',
        	'sort'=>50
        	]);

    }
}
