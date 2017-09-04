<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //指定表名
    protected $table = 'Rooms_type';

    //主键
    protected $primaryKey = 'room_type_id';

    //自动维护时间戳
    public $timestamps = false;

}
