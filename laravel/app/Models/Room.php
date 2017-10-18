<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //指定表名
    protected $table = 'Rooms';

    //主键
    protected $primaryKey = 'room_id';

    //自动维护时间戳
    public $timestamps = false;

}
