<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailed extends Model
{
    //指定表名
    protected $table = 'detailed';

    //主键
    protected $primaryKey = 'detailed_id';

    //自动维护时间戳
    public $timestamps = true;

}
