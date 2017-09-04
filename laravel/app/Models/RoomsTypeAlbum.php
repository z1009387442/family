<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomsTypeAlbum extends Model
{
    //指定表名
    protected $table = 'rooms_type_album';

    //主键
    protected $primaryKey = 'album_id';

    //自动维护时间戳
    public $timestamps = false;

}