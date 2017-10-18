<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Businessdistrict extends Model
{
    //指定表名
    protected $table = 'business_district';

    //主键
    protected $primaryKey = 'business_district_id';

    //自动维护时间戳
    public $timestamps = true;

}
