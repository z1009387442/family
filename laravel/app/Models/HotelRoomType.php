<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
    //指定表名
    protected $table = 'hotel_room_type';

    //主键
    //protected $primaryKey = 'hotel_album_id';

    //自动维护时间戳
    public $timestamps = false;

}