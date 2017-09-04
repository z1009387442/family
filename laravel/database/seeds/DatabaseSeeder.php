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
    }
}
