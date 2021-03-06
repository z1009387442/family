<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomsType extends Model
{
    //指定表名
    protected $table = 'rooms_type';

    //主键
    protected $primaryKey = 'room_type_id';

    //自动维护时间戳
    public $timestamps = false;

}
