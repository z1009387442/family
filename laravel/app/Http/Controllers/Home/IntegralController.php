<?php

namespace App\Http\Controllers\Home;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;
use App\Models\Index;
use App\Models\IntegralLog;
use App\Models\Goods;
use App\Models\Detailed;
use Redirect;
use Carbon\Carbon;

class IntegralController extends Controller
{
	/**
	 * [selectPay description]
	 * 描述：展示商品兑换券
	 * @access public
	 * @author cex
	 * @return [type]     object [description]
	 */
	public function index(Request $request)
	{
		$list =Goods::all();
		return view('integral.integral',['goods_list'=>$list]);
	}

	/**
	 * [selectPay description]
	 * 点击兑换券
	 * @access public
	 * @author cex
	 * @return [type]         [description]
	 */
	public function convert(Request $request)
	{
		$user_id=$request->session()->get('user_id');
		if ($request->isMethod('post')) {
			$user_data=Index::where('user_id',"$user_id")->select('integral')->first();
			$goods_price=$request->goods_price;
			$goods_id   =$request->goods_id;
			$goods_name =$request->goods_name;
			if ($user_data['integral'] < $goods_price) {

				return false;
			}
			$created_at =Carbon::now();
			$Detailed   = new Detailed;	
			$Detailed->goods_id		= $goods_id;
			$Detailed->goods_price  = $goods_price;
			$Detailed->user_id		= $user_id;
			$Detailed->created_at	= $created_at;			
			$bool = $Detailed->save();
			if ($bool) {
					 //兑换成功扣除积分
					Index::where('user_id',"$user_id")->decrement('integral',"$goods_price");
					$info=$this->integral_log_add($Detailed->detailed_id,$goods_name,$goods_price,$user_id);
						if ($info) {

							return redirect('home/personal_data');
						}					
					}
		} else {
			$goods_id=$request->goods_id;
			$list =Goods::where('goods_id',"$goods_id")->first();
			$goods_desc=explode(';',$list['goods_desc']);
			$user=Index::where('user_id',"$user_id")->select('integral')->first();
				if (empty($user)) {

					return view('integral.convert',[
							'goods_one'=>$list,
							'goods_desc'=>$goods_desc,
							'user'=>$user
						]);				
				} else {

					return view('integral.convert',[
							'goods_one'=>$list,
							'goods_desc'=>$goods_desc,
							'user'=>$user
						]);
				}
		}
	}

	/**
	 * [selectPay description]
	 * 记录积分日志
	 * @access public
	 * @author cex
	 * @return [type]    true  [description]
	 */
	public function integral_log_add($detailed_id,$goods_name,$goods_price,$user_id)
	{
		$integral_log= new IntegralLog;
		$integral_log->action='兑换了:'.$goods_name;
		$integral_log->order_sn=' ';
		$integral_log->num=$goods_price;
		$integral_log->regulation='2';
		$integral_log->detailed_id=$detailed_id;
		$integral_log->user_id=$user_id;
		$integral_log->create_at=time();
		$bool=$integral_log->save();	
		if ($bool) {
			
			 return $bool;
		}
	}


}