<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //指定表名
    protected $table = 'team';

    //主键
    protected $primaryKey = 'id';

    //自动维护时间戳
    public $timestamps = false;

}
