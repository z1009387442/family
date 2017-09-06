<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelAlbum extends Model
{
    //指定表的名
    protected $table = 'hotel_album';

    //主键
    protected $primaryKey = 'hotel_album_id';

    //自动维护时间戳
    public $timestamps = false;

}