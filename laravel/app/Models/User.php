<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //指定表名
    protected $table = 'user';

    //主键
    protected $primaryKey = 'user_id';

    //自动维护时间戳
    public $timestamps = false;

}
