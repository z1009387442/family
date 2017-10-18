<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request ,Closure $next)
    {
        if (!$request->session()->has('admin_id')) {

            return redirect('admin/login/login');
        
        }
        return $next($request);
    }

   //   public function check_power($admin_id,$uri)
   //  {
   //  	$power_id=[];

   //  	//查询当前用户对应的权限ID
   //  	$power_info=AdminPower::where('admin_id',$admin_id)->get();

   //  	foreach($power_info as $power){
   //  		$power_id[]=$power->power_id;
   //  	}

   //  	//获取当前路由对应的权限ID
 		// $power_id_info=Power::where('power_desc',$uri)->first();
 		// $power_now_id = 0;//默认为0，若权限表有数据则覆盖
 		// if($power_id_info){
 		// 	$power_now_id = $power_id_info->power_id;
 		// }		

   //  	//判断当前路由是否在该权限路由内  	
 		// if(in_array($power_now_id,$power_id)){
 		// 	return true;
 		// }else{
 		// 	return false;
 		// }

   //  }


}