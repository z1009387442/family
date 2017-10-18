<?php 	
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Index extends Model
{	//指定表名
      protected    $table='user';
      //指定ID
      protected    $primaryKey="user_id";
      public       $timestamps=true;
      //指定不允许批量赋值的字段
      protected    $fillable=['user_name'];
      //指定允许批量赋值的字段
      protected    $guarded=[];
      protected function getDateFormat(){
      	return time();
      }
      protected function asDateTime($val){
      	return $val;	
      }

}



 ?>