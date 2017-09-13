<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    //指定表名
    protected $table = 'discounts';

    //主键
    protected $primaryKey = 'discounts_id';

    //自动维护时间戳
    public $timestamps = false;

}
