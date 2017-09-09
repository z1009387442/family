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
class IntegralController extends Controller
{
	public function index(Request $request)
	{

		$list =Goods::all();
		return view('integral.integral',['goods_list'=>$list]);

	}
	//点击兑换券
	public function convert(Request $request)
	{
		$user_id=$request->session()->has('user_id');
		if($request->isMethod('post'))
		{
			$user_data=Index::where('user_id',"$user_id")->select('integral')->first();Index::where('user_id',"$user_id")->first();

			$goods_price=$request->goods_price;
			$goods_id   =$request->goods_id;
			$goods_name =$request->goods_name;
			if($user_data['integral'] < $goods_price)
			{
				return false;
			}
			$created_at =date("Y-m-d H:i:s",time());
			$Detailed   = new Detailed;	
			$Detailed->goods_id		= $goods_id;
			$Detailed->goods_price  = $goods_price;
			$Detailed->user_id		= $user_id;
			$Detailed->created_at	= $created_at;			
			$bool = $Detailed->save();
			if($bool)
			{
				Index::decrement('integral',"$goods_price"); //兑换成功扣除积分
				return redirect::to('home/integral/integral_log_add?detailed_id='.$Detailed->detailed_id."&&goods_name=".$goods_name."&&goods_price=".$goods_price);
			}

		}else
		{
			$goods_id=$request->goods_id;
			$list =Goods::where('goods_id',"$goods_id")->first();
			$goods_desc=explode(';',$list['goods_desc']);
			$user=Index::where('user_id',"$user_id")->select('integral')->first();
			if(empty($user))
			{

				return view('integral.convert',['goods_one'=>$list,'goods_desc'=>$goods_desc,'user'=>$user]);
			
			}else {
				return view('integral.convert',['goods_one'=>$list,'goods_desc'=>$goods_desc,'user'=>$user]);
			}
		}
	}
	//记录积分日志
	public function integral_log_add(Request $request)
	{
				$detailed_id=$request->detailed_id;
				$goods_name =$request->goods_name;
				$goods_price=$request->goods_price;
				$user_id=$request->session()->has('user_id');
				//echo $detailed_id;die;
				$integral_log= new IntegralLog;
				$integral_log->action='兑换了:'.$goods_name;
				$integral_log->order_sn=' ';
				$integral_log->num=$goods_price;
				$integral_log->jj='2';
				$integral_log->detailed_id=$detailed_id;
				$integral_log->user_id=$user_id;
				$integral_log->create_at=time();
				$bool=$integral_log->save();
				if($bool)
				{
					// echo "<script>alert('兑换成功,扣除积分：$goods_price');</script>";
					
					 return redirect('home/personal_data');
				}
	}


}