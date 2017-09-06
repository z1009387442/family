<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //指定表名
    protected $table = 'goods';

    //主键
    protected $primaryKey = 'goods_id';

    //自动维护时间戳
    public $timestamps = false;

}
