<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomsFacilities extends Model
{
    //指定表名
    protected $table = 'rooms_facilities';

    //主键
    protected $primaryKey = 'rooms_facilities_id';

    //自动维护时间戳
    public $timestamps = false;

}
