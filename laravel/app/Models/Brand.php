<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 品牌model
class Brand extends Model
{
    //指定表名
    protected $table = 'brand';

    //主键
    protected $primaryKey = 'brand_id';

    //自动维护时间戳
    public $timestamps = false;

}
