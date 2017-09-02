<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //指定表名
    protected $table = 'region';

    //主键
    protected $primaryKey = 'id';

    //自动维护时间戳
    public $timestamps = false;

}
