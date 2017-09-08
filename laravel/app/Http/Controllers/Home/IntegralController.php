<?php
namespace App\Http\Controllers\Home;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;
use App\Models\Goods;
use App\Models\Detailed;
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
		if($request->isMethod('post'))
		{
			$Detailed = new Detailed;
			$user_id=$request->session()->has('user_id');
			$created_at=date("Y-m-d H:i:s",time());
			//echo $created_at;die;
			$data = $request->all();
			//print_r($data);die;
			$Detailed->goods_id=$data['goods_id'];
			$Detailed->goods_price=$data['goods_price'];
			$Detailed->user_id=$user_id;
			$Detailed->created_at=$created_at;			
			$bool = $Detailed->save();
			if($bool)
			{
				// $integral_log= new integral_log;
				// $integral_log->action='兑换兑换券:'.$data['goods_name'];
				// $integral_log->order_sn='';
				// $integral_log->num=$data['goods_price'];
				// $integral_log->jj='2';
				// $integral_log->detailed_id=$bool;
				// $integral_log->user_id=$user_id;
				// $integral_log->created_at=$create_at;
				// $integral_log->save();

			}

		}else
		{
			$goods_id=$request->goods_id;
			$list =Goods::where('goods_id',"$goods_id")->first();
			$goods_desc=explode(';',$list['goods_desc']);
			return view('integral.convert',['goods_one'=>$list,'goods_desc'=>$goods_desc]);
		}
	}



}