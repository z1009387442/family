<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplexFacilities extends Model
{
    //指定表名
    protected $table = 'complex_facilities';

    //主键
    protected $primaryKey = 'complex_facilities_id';

    //自动维护时间戳
    public $timestamps = false;

}
