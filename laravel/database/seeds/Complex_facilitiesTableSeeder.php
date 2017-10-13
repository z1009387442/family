<?php

use Illuminate\Database\Seeder;
use App\Models\ComplexFacilities;
class Complex_facilitiesTableSeeder extends Seeder
{
    /**
     * 填充服务设施数据
     *
     * @return void
     */
    public function run()
    {
        ComplexFacilities::create([
        	'complex_facilities_name'=>'大厅上网',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'停车场',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'健身房',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'洗车服务',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'传真打印',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'台球厅',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'POS机',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'行李寄存',
        	'sort'=>50
        	]);
        ComplexFacilities::create([
        	'complex_facilities_name'=>'免费咖啡饮料',
        	'sort'=>50
        	]);
    }
}
