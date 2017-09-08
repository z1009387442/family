<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntegralLog extends Model
{
    protected $table = 'integral_log';

     //主键
    protected $primaryKey = 'log_id';

    //自动维护时间戳
    public $timestamps = false;
}
